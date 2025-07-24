<?php

use App\Http\Controllers\Api\AuthControllerApi;
use App\Http\Controllers\Api\BooksControllerApi as ApiBooksController; // Pastikan namespace controller benar (memberi alias)
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Public routes (tidak perlu autentikasi)
Route::post('/register', [AuthControllerApi::class, 'register']);
Route::post('/login', [AuthControllerApi::class, 'login']);

// Protected routes (membutuhkan autentikasi menggunakan Sanctum)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthControllerApi::class, 'logout']);
    Route::get('/user', [AuthControllerApi::class, 'user']);
    // Tambahkan API routes lain untuk buku, rental, purchase di sini
    // Contoh:
    // Route::get('/books', [BookController::class, 'index']);
});

// Rute CRUD untuk Books API
Route::get('/books', [ApiBooksController::class, 'index']);

// Alternatif menggunakan apiResource:
// Route::apiResource('contracts', ContractController::class);
// Jika menggunakan apiResource, pastikan method di controller Anda
// mengikuti konvensi nama Laravel (index, store, show, update, destroy)
// dan parameter untuk show, update, destroy menggunakan route model binding (misal: show(Contract $contract)).
