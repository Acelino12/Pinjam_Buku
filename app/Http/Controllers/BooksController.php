<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use App\Models\Books;
use App\Models\Publishers;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index()
    {
        $books = Books::select('id', 'title', 'code_book', 'is_saleable', 'is_rentable')->get();

        return view('books.index', ['books' => $books]);
    }

    public function showinput()
    {
        $author = Authors::all();
        $publisher = Publishers::all();

        return view('books.add-book', [
            'authors' => $author,
            'publishers' => $publisher,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255|string',
            'author_id' => 'required|exists:authors,id',
            'publisher' => 'required|exists:publishers,id',
            'description' => 'required|string',
            'stock_for_sale' => 'required|integer|min:0',
            'sale_price' => 'required|numeric|min:0',
            'stock_for_rent' => 'required|integer|min:0',
            'pages' => 'required|integer|min:1',
        ]);

        if ($request->stock_for_sale > 0) {
            $is_saleable = true;
        } else {
            $is_saleable = false;
        }

        if ($request->stock_for_rent > 0) {
            $is_rentable = true;
        } else {
            $is_rentable = false;
        }

        $code_book = time().date('dm').random_int(100, 999);

        Books::create([
            'title' => $request->title,
            'author_id' => $request->author_id,
            'code_book' => $code_book,
            'publisher' => $request->publisher,
            'description' => $request->description,
            'stock_for_sale' => $request->stock_for_sale,
            'is_saleable' => $is_saleable,
            'sale_price' => $request->sale_price,
            'stock_for_rent' => $request->stock_for_rent,
            'is_rentable' => $is_rentable,
            'book_cover' => $request->book_cover,
            'pages' => $request->pages,
        ]);

        return redirect('/books')->with('success', 'berhasil menambah buku');
    }

    public function show($id)
    {
        $databuku = Books::find($id);

        return view('books.detail-book', ['databuku' => $databuku]);
    }
}
