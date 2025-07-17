<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Bookstore_users;
use App\Models\rental_orders;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class RentalController extends Controller
{
    public function index()
    {
        $datarental = rental_orders::with('user:id,name')
            ->select('id', 'user_id', 'books_id', 'code_rent', 'due_at', 'status')
            ->where('status', '!=', 'completed')
            ->get();
        $view = false;
        return view('rental.index', ['datarental' => $datarental, 'view' => $view]);
    }

    public function showCompleted()
    {
        $datarental = rental_orders::with('user:id,name')
            ->select('id', 'user_id', 'books_id', 'code_rent', 'due_at', 'status')
            ->where('status', '=', 'completed')
            ->get();
        $view = true;

        return view('rental.index', ['datarental' => $datarental, 'view' => $view]);
    }

    public function showinput()
    {
        $users = Bookstore_users::where('can_rent', true)->select('id', 'name')->get();
        $books = Books::where('is_rentable', true)->select('id', 'title', 'stock_for_rent')->get();
        $date = date('d-m-Y');
        return view('rental.add-rental', [
            'users' => $users,
            'date'  => $date,
            'books' => $books
        ]);
    }

    public function edit($id)
    {
        $data = rental_orders::find($id);

        $dueat = Carbon::parse($data->due_at);
        $dateNow = Carbon::parse(now());

        $late_days = 0; // Inisialisasi untuk menghindari variabel tidak terdefinisi jika kondisi salah

        if ($data->status != 'completed') {
            if ($dateNow->greaterThan($dueat)) {
                $late_days = (int) $dateNow->diffInDays($dueat) * -1;
                $late_weeks = (int) ceil($late_days / 7); // 1-7 hari = 1 minggu, 8-14 = 2 minggu, dst
                $fee = $late_weeks * 15000;
                $status = 'overdue';
                rental_orders::where('id', $id)->update([
                    'status'            => $status,
                    'total_late_fee'    => $fee,
                ]);
            }
        }

        $datenew = rental_orders::with([
            'user:id,name',
            'books:id,title'
        ])
            ->select('id', 'user_id', 'books_id', 'status', 'rental_date', 'due_at', 'late_fee_per_week')
            ->find($id);

        return view('rental.edit-rental', ['data' => $datenew, 'lateDays' => $late_days]);
    }

    public function update(Request $request, $id)
    {
        $status = $request->status;
        $dateNow = Carbon::createFromFormat('d-m-Y', $request->dateNow);
        $fee = 0;
        if ($status == 'overdue') {
            return view('rental.payment')->with([$id, $dateNow]);
        } else {
            $this->plusBook($request->book_id);
            rental_orders::where('id', $id)->update([
                'returned_at'       => $dateNow,
                'status'            => $status,
                'total_late_fee'    => $fee
            ]);
            return redirect('/rental')->with('success','Berhasil update data');
        };
    }

    public function rentaladd(Request $request)
    {
        // update book stok
        $this->minBook($request->book_id);

        $rentaldate = Carbon::now();
        $due_at = $rentaldate->copy()->addDays(7)->format('d-m-Y');

        $code_rent = $this->generateCode();
        $status = 'active';

        rental_orders::create([
            'user_id'       => $request->user_id,
            'books_id'      => $request->book_id,
            'rental_date'   => $rentaldate,
            'due_at'        => $due_at,
            'code_rent'     => $code_rent,
            'status'        => $status
        ]);

        return redirect('/rental')->with('success', 'berhasil menambah data');
    }

    // minus stok book
    private function minBook($id)
    {
        $databuku = Books::find($id);
        $databuku->stock_for_rent -= 1; // kurang satu
        if ($databuku->stock_for_rent <= 0) {
            $databuku->stock_for_rent = 0;
            $databuku->is_rentable = false;
        }
        $databuku->save();
        return $databuku;
    }

    // plus stok book

    private function plusBook($id)
    {
        $dataBuku = Books::find($id);
        $dataBuku->stock_for_rent += 1;
        if ($dataBuku->stock_for_rent > 0) {
            $dataBuku->is_rentable = true;
        }
        $dataBuku->save();
        return $dataBuku;
    }

    private function generateCode()
    {
        // Asumsi format: RNT-YYYYMMDD-NNNNN
        $prefix = 'RNT-';
        $currentDate = Carbon::now()->format('Ymd');
        $searchPattern = $prefix . $currentDate . '%';

        $generatedCode = '';
        $isUnique = false;
        $attempt = 0;

        while (!$isUnique && $attempt < 10) { // Batasi percobaan
            $lastCode = rental_orders::where('code_rent', 'like', $searchPattern)
                ->orderBy('code_rent', 'desc')
                ->first();

            $newNumber = 1;
            if ($lastCode) {
                $lastSequence = (int) substr($lastCode->code_rent, -5); // Ambil 5 digit terakhir
                $newNumber = $lastSequence + 1;
            }

            $newSequence = str_pad((string)$newNumber, 5, '0', STR_PAD_LEFT);
            $generatedCode = $prefix . $currentDate . '-' . $newSequence;

            if (!rental_orders::where('code_rent', $generatedCode)->exists()) {
                $isUnique = true;
            }
            $attempt++;
        }

        if (!$isUnique) {
            throw new \Exception("Gagal menggenerasi kode sewa unik setelah beberapa percobaan.");
        }

        return $generatedCode;
    }

    public function show($id)
    {
        $rental = rental_orders::with([
            'user:id,name,email,phone,address',
            'books:id,title'
        ])
            ->select('id', "user_id", "books_id", "code_rent", "rental_date", "due_at", "status")
            ->find($id);

        // dd($rental);
        return view('rental.detail-rental', ['rental' => $rental]);
    }

    // public function showAlert(rental_orders $rentalOrder){
    //     $userName = $rentalOrder->user ? $rentalOrder->user->name : 'N/A';
    //     $rentalDate = $rentalOrder->rental_date ? Carbon::parse($rentalOrder->rental_date)->format('d F Y') : 'N/A';

    //     return response()->json([
    //         'id' => $rentalOrder->id,
    //         'user_name' => $userName,
    //         'rental_date' => $rentalDate,
    //     ]);
    // }
}
