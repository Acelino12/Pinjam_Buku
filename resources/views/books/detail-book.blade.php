@extends('layouts.crud')

@section('title', 'detail book')

@section('css')
<style>
    textarea {
        width: 100%;
        height: 50px;
    }
</style>
@endsection

@section('content')
    <h3>Detail Book</h3>

    <div class="container">
        <form method="GET">
            @csrf

            <div class="mb-3">
                <label for="title">Title :</label>
                <input type="text" id="title" name="title" value="{{$databuku->title}}" readonly>
                @error('title')
                    <p class='error-line'>{{$message}}</p>
                @enderror
            </div>

            {{-- <div class="mb-3">
                <label for="author_id">Author: </label>
                <select name="author_id" id="author_id" readonly>
                    @foreach ($authors as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                @error('author_id')
                    <p class='error-line'>{{$message}}</p>
                @enderror
            </div> --}}

            {{-- <div class="mb-3">
                <label for="publisher">Publisher: </label>
                <select name="publisher" id="publisher" readonly>
                    @foreach ($publishers as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                @error('publisher')
                    <p class='error-line'>{{$message}}</p>
                @enderror
            </div> --}}

            <div class="mb-3">
                <label for="description">description :</label>
                <textarea type="text" id="description" name="description" readonly>
                    {{$databuku->description}}
                </textarea>
                @error('description')
                    <p class='error-line'>{{$message}}</p>
                @enderror
            </div>

            <div class="form-grup">
                <label for="stock_for_sale">Stock Jual :</label>
                <input type="number" id="stock_for_sale" name="stock_for_sale" value="{{$databuku->stock_for_sale}}" readonly />
                @error('stock_for_sale')
                    <P class="error-line"> {{$message}}</P>
                @enderror
            </div>

            <div class="form-grup">
                <label for="sale_price">Harga Jual :</label>
                <input type="number" id="sale_price" name="sale_price" value="{{$databuku->sale_price}}" readonly/>
                @error('sale_price')
                    <P class="error-line"> {{$message}}</P>
                @enderror
            </div>

            <div class="form-grup">
                <label for="stock_for_rent">Stock Sewa :</label>
                <input type="number" id="stock_for_rent" name="stock_for_rent" value="{{$databuku->stock_for_rent}}" readonly />
                @error('stock_for_rent')
                    <P class="error-line"> {{$message}}</P>
                @enderror
            </div>

            {{-- <div class="form-grup">
                <label for="book_cover">Book Cover :</label>
                <div class="input-group">
                    <input type="file" class="form-control" id="book_cover" name="book_cover">
                </div>
            </div> --}}

            {{-- <div class="form-grup">
                <label for="genre">Genre :</label>
                <div class="input-group">
                    <select id="genre" name="genre">
                        <option>Komedi</option>
                    </select>
                </div>
            </div> --}}

            <div class="form-grup">
                <label for="pages">Jumlah Halaman :</label>
                <div class="input-group">
                    <input type="number" class="form-control" id="pages" name="pages" value="{{$databuku->pages}}" readonly>
                </div>
            </div>
        </form>
        <a href="{{url('/books')}}">back </a>
    </div>
@endsection

@section('js')

@endsection