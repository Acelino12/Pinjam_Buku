<?php

namespace App\Http\Controllers;

use App\Models\Countries;
use App\Models\Publishers;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index(){
        $dataPublisher = Publishers::all();
        return view('publisher.index',['dataPublisher' => $dataPublisher]);
    }

    public function showinput(){
        $country = Countries::all();
        return view('publisher.add-publisher',['country' => $country]);
    }

    public function store(Request $request){
        $request->validate([
            'name'          => 'required|max:255',
            'email'         => 'required|email|unique:publishers,email',
            'address'       => 'required',
            'country_id'    => 'required',
            'phone'         => 'required',
            'web_url'       => 'required'
        ]);

        Publishers::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'address'       => $request->address,
            'country_id'    => $request->country_id,
            'phone'         => $request->phone,
            'web_url'       => $request->web_url
        ]);

        return redirect('/publisher')->with(['success', 'berhasil input']);
    }
}
