<?php

namespace App\Http\Controllers;

use App\Models\Countries;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(){
        $country = Countries::all();

        return view('feature.country',['country' => $country]);
    }
    public function create(Request $request){
        $request->validate([
            'name' => 'required|max:100'
        ]);

        Countries::create([
            'name' => $request->name,
        ]);

        return redirect('/countrys')->with('success','berhasil menambahkan Negara');
    }
}
