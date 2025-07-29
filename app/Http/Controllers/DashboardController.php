<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Bookstore_users;
use App\Models\rental_orders;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBook = Books::count();
        $totalUser = Bookstore_users::count();
        $totalRental = rental_orders::where('status', '!=', 'completed')->count();

        return view('dashboard.index', [
            'book' => $totalBook,
            'user' => $totalUser,
            'rental' => $totalRental,
        ]);
    }
}
