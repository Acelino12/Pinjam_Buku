<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\UsersController;
use App\Models\rental_orders;
use Illuminate\Support\Facades\Route;

// auth
Route::get('login', function () {
    return view('auth.login');
})->name('login');
Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'formRegister');
    Route::post('/postauth', 'register');
    Route::get('/auth', 'login');
    Route::get('/logout', 'logout');
});

Route::middleware('auth')->group(function () {

    // dashboard
    Route::get('/', function () {
        return view('layouts.app');
    });
    Route::get('/home', function () {
        return view('layouts.app');
    });

    // Country
    Route::prefix('countrys')->controller(CountryController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('newcountry', 'input');
        Route::post('addcountry', 'create');
        Route::get('delete/{id}', 'delete');
    });

    // input users
    Route::prefix('users')->controller(UsersController::class)->group(function () {
        Route::get('/', 'index'); //all users
        Route::get('/newuser', 'showinput'); // menampilkan daftar negara
        Route::post('/adduser', 'store');
        Route::get('/userdetails/{id}', 'show');
        Route::get('/userdelete/{id}', 'delete');
        Route::get('/softdelete', 'softdelete');
    });

    // publisher
    Route::prefix('publishers')->controller(PublisherController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('newpublisher', 'showinput');
        Route::post('addpublisher', 'store');
    });

    // Author
    Route::prefix('authors')->controller(AuthorController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/newauthor', 'showinput');
        Route::post('/addauthor', 'store');
    });

    // Book
    Route::prefix('/books')->controller(BooksController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/newbook', 'showinput');
        Route::post('/addbook', 'store');
        Route::get('/bookdetail/{id}', 'show');
    });

    // Rental
    Route::prefix('/rental')->controller(RentalController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/completed', 'showCompleted');
        Route::get('/newrental', 'showinput');
        Route::post('/addrental', 'rentaladd');
        Route::get('/rentdetail/{id}', 'show');
        // Route::get('{id}/details','showAlert')->name('rental-orders.details');;
        Route::get('/rentupdate/{id}', 'edit');
        Route::post('/rentupdate/update/{id}', 'update');
        Route::post('/rentupdate/rentpayment/{id}', 'checkPay');
    });

    // Sales
    Route::prefix('sales')->controller(SalesController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/newsales', function () {
            return view('sales.add-sales');
        });
        Route::post('/addsales', 'store');
    });
});
