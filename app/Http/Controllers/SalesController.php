<?php

namespace App\Http\Controllers;

use App\Models\Purchases;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index() {
        $datasales = Purchases::all();

        return view('sales.index',['datasales'=> $datasales]);
    }

    public function showInput(){
        // user_id
        // book_id
        // code_purchase
    }

    public function store(){
        // date hari ini sudah timestem 
        // status pending
        // payment_status (paid)
        // total_amount
    }
}
