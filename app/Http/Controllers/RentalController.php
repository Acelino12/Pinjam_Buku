<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Bookstore_users;
use App\Models\rental_orders;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index(){
        $datarental = rental_orders::with('user')->get();

        return view('rental.index', ['datarental' => $datarental]);
    }

    public function showinput(){
        $users = Bookstore_users::where('can_rent',true)->select('id','name')->get();
        $books = Books::where('is_rentable',true)->select('id','title')->get();
        $date = date('d-m-Y');
        return view('rental.add-rental',[
            'users' => $users,
            'date'  => $date,
            'books' => $books
        ]);
    }

    public function edit($id){
        $data = rental_orders::with([
            'user:id,name',
            'books:id,title'
            ])
            ->select('id','user_id','books_id','status','rental_date','due_at','late_fee_per_week')
            ->find($id);

        return view('rental.edit-rental',['data' => $data]);
    }

    public function rentaladd(Request $request){
        $iduser = $request->user_id;
        $bookid = $request->book_id;

        // update book stok
        $this->bookStok($bookid);

        $rentaldate = Carbon::now();
        $due_at = $rentaldate->copy()->addDays(7)->format('d-m-Y');

        $code_rent = $this->generateCode();
        $status = 'active';
        
        rental_orders::create([
            'user_id'       => $iduser,
            'books_id'      => $bookid,
            'rental_date'   => $rentaldate,
            'due_at'        => $due_at,
            'code_rent'     => $code_rent,
            'status'        => $status
        ]);

        return redirect('/rental')->with('success','berhasil menambah data');
    }

    // update stok
    private function bookStok($id){
        $databuku = Books::find($id);
        $databuku->stock_for_rent -= 1; // kurang satu
        if ($databuku->stock_for_rent <= 0){
            $databuku->stock_for_rent = 0;
            $databuku->is_rentable = false;
        }
        $databuku->save();
        return $databuku;
    }

    private function generateCode(){
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

    public function show($id){
        $rental = rental_orders::with(['user','books'])->find($id);

        return view('rental.detail-rental',['rental' => $rental]);
    }
}
