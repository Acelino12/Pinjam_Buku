<?php

namespace App\Http\Controllers;

use App\Models\Bookstore_users;
use App\Models\Countries;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index(){
        $datausers = Bookstore_users::all();

        return view('users.index',['datausers'=>$datausers]);
    }

    public function showinput(){
        $country = Countries::all();

        return view('users.add-user',['country'=>$country]);
    }

    public function store(Request $request){
        $request->validate([
            'name'          => 'required|max:255|string',
            'email'         => 'required|email|unique:bookstore_users,email',
            'date_of_birth' => 'required',
            'gender'        => 'required',
            'phone'         => 'required',
            'country_id'    => 'required'
        ]);

        // password dengan tgl lahir
        $dateOfBirth = Carbon::parse($request->date_of_birth);
        $genetatedpassword = $dateOfBirth->format('dmY');

        // usia
        $age = date('Y') - Carbon::parse($request->date_of_birth)->format('Y');

        // generates code user BKU-20250700001
        $prefix = 'BKU-';
        $currentYearMonth = Carbon::now()->format('Ym'); // Contoh: 202507
        $searchPattern = $prefix . $currentYearMonth . '%'; // Misal: BKU-202507%

        // Ambil kode pengguna terakhir untuk bulan ini, diurutkan berdasarkan code_user (numeric) atau id (jika id selalu naik)
        // Pastikan 'code_user' di-cast ke integer jika ingin sorting numerik, atau string jika sorting alfabetik.
        // Jika formatnya 'BKU-YYYYMM-NNNNN', lebih baik ambil 5 digit terakhir untuk diincrement.
        $lastCodeUser = Bookstore_users::where('code_user', 'like', $searchPattern)
                                        ->orderBy('code_user', 'desc') // Urutkan berdasarkan code_user secara menurun
                                        ->first();

        $newNumber = 1;

        if ($lastCodeUser) {
            // Ambil 5 digit terakhir dari code_user
            $lastSequence = (int) substr($lastCodeUser->code_user, -5);
            $newNumber = $lastSequence + 1;
        }

        // Format nomor urut menjadi 5 digit dengan leading zeros
        $newSequence = str_pad((string)$newNumber, 5, '0', STR_PAD_LEFT);

        // Gabungkan semua bagian
        $finalCode = $prefix . $currentYearMonth . $newSequence;

        Bookstore_users::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => Hash::make($genetatedpassword),
            'date_of_birth' => $request->date_of_birth,
            'gender'        => $request->gender,
            'age'           => $age,
            'code_user'     => $finalCode,
            'phone'         => $request->phone,
            'country_id'    => $request->country_id
        ]);

        return Redirect('/users')->with('success','berhasil input data');
    }

    public function show($id){
        $user = Bookstore_users::with('countries')->findOrFail($id);
        $date = Carbon::parse($user->date_of_birth)->format('d-m-Y');
        return view('users.datail-user',['user' => $user,'date' => $date]);
    }

    public function delete($id){
        $user = Bookstore_users::find($id);
        $user->delete();

        return redirect('/users');
    }

    // data yang telah di soft delete
    public function softdelete(){
        $dataSoftDelete = Bookstore_users::onlyTrashed()->get();
        return view('feature.soft-delete',['datausers' => $dataSoftDelete]);
    }
}
