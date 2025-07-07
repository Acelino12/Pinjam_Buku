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
}
