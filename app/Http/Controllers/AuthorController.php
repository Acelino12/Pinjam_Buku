<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use App\Models\Countries;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(){
        $dataAuthors = Authors::select('id','name','web_url')->get();

        return view('authors.index', ['dataAuthors' => $dataAuthors]);
    }

    public function showinput(){
        $country = Countries::all();
        return view('authors.add-author',['country' => $country]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'bio' => 'required',
            'date_of_birth' => 'required',
            'country_id' => 'required',
            'web_url' => 'required',
        ]);

        Authors::create([
            'name' => $request->name,
            'bio' => $request->bio,
            'date_of_birth' => $request->date_of_birth,
            'country_id' => $request->country_id,
            'web_url' => $request->web_url
        ]);

        return redirect('/authors')->with(['success','berhasil menambah author']);
    }
}
