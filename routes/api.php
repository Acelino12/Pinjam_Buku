<?php

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

// Rute default Laravel untuk user yang terautentikasi (opsional)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->admin();
});

// Rute CRUD untuk Books API Anda
Route::get('/books', [ApiBooksController::class, 'index']);

// Alternatif menggunakan apiResource:
// Route::apiResource('contracts', ContractController::class);
// Jika menggunakan apiResource, pastikan method di controller Anda
// mengikuti konvensi nama Laravel (index, store, show, update, destroy)
// dan parameter untuk show, update, destroy menggunakan route model binding (misal: show(Contract $contract)).
