<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Books;
use Illuminate\Http\Request;

class BooksControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataBook = Books::all()->map(function($book){
            return [
                'id' => $book->id,
                'title' => $book->title,
                'code_book' => $book->code_book,
            ];
        });

        return response()->json([
            'success' => true,
            'message' => 'berhasil ambil data',
            'data' => $dataBook
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
