<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use App\Models\Countries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function formRegister(){
        $country = Countries::all();

        return view('auth.register',['listcountry' => $country]);
    }

    public function register(Request $request) {
        $request->validate([
            'name'      => 'required|max:255|string',
            'email'     => 'required|email|unique:admins,email',
            'password'  => 'required|min:6|confirmed',
        ]);
        Admins::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success','berhasil register');
    }

    public function login(Request $request){
        $validasi = $request->validate([
            'name'      => 'required|email',
            'password'  => 'required'
        ]);

        if (Auth::attempt($validasi)){
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }
}
