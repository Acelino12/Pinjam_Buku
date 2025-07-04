<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\UsersController;
use App\Models\Bookstore_users;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login',function(){
    return view('auth.login');
});

Route::get('/register',[AuthController::class,'formRegister']);
Route::post('/postauth',[AuthController::class,'register']);
Route::get('/auth',[AuthController::class,'login']);
Route::get('/home', function(){
    return view('layouts.app');
});

Route::get('/country',[CountryController::class,'index']);
Route::get('/newcountry',function(){
    return view('feature.add-country');
});
Route::post('/addcountry',[CountryController::class,'create']);


Route::get('/sales',[SalesController::class,'index']);
Route::get('/newsales',function(){
    return view('sales.add-sales');
});
Route::post('/addsales',[SalesController::class,'']);


// input users
Route::get('/users',[UsersController::class,'index']); // all users
Route::get('/newuser',[UsersController::class,'showinput']); // untuk menampilka daftar negara
Route::post('/adduser',[UsersController::class,'store']); // input new user
Route::get('/userdetails/{id}',[UsersController::class,'show']); // detail user
Route::get('/userdelete/{id}',[UsersController::class,'delete']); // delete user
Route::get('/softdelete',[Bookstore_users::class,'softdelete']);