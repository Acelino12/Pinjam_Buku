@extends('layouts.crud')

@section('title', 'new book')

@section('css')
<style>
    textarea {
        width: 100%;
        height: 50px;
    }
</style>
@endsection

@section('content')
    <h3>Create new Book</h3>

    <div class="container">
        <form action="{{url('/addbook')}}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title">Title :</label>
                <input type="text" id="title" name="title" required>
                @error('title')
                    <p class='error-line'>{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="author_id">Author: </label>
                <select name="author_id" id="author_id">
                    {{-- perlu update --}}
                    <option value=""></option>
                    @foreach ($authors as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                @error('author_id')
                    <p class='error-line'>{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="publisher">Publisher: </label>
                <select name="publisher" id="publisher">
                    @foreach ($publishers as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                    {{-- perlu update --}}
                        <a href="{{url('/newpublisher')}}">Tambah publisher</a>
                </select>
                @error('publisher')
                    <p class='error-line'>{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description">description :</label>
                <textarea type="text" id="description" name="description" required></textarea>
                @error('description')
                    <p class='error-line'>{{$message}}</p>
                @enderror
            </div>

            <div class="form-grup">
                <label for="stock_for_sale">Stock Jual :</label>
                <input type="number" id="stock_for_sale" name="stock_for_sale" required />
                @error('stock_for_sale')
                    <P class="error-line"> {{$message}}</P>
                @enderror
            </div>

            <div class="form-grup">
                <label for="sale_price">Harga Jual :</label>
                <input type="number" id="sale_price" name="sale_price" required/>
                @error('sale_price')
                    <P class="error-line"> {{$message}}</P>
                @enderror
            </div>

            <div class="form-grup">
                <label for="stock_for_rent">Stock Sewa :</label>
                <input type="number" id="stock_for_rent" name="stock_for_rent" required />
                @error('stock_for_rent')
                    <P class="error-line"> {{$message}}</P>
                @enderror
            </div>

            <div class="form-grup">
                <label for="book_cover">Book Cover :</label>
                <div class="input-group">
                    <input type="file" class="form-control" id="book_cover" name="book_cover">
                </div>
            </div>

            <div class="form-grup">
                <label for="genre">Genre :</label>
                <div class="input-group">
                    <select id="genre" name="genre">
                        <option>Komedi</option>
                    </select>
                </div>
            </div>

            <div class="form-grup">
                <label for="pages">Jumlah Halaman :</label>
                <div class="input-group">
                    <input type="number" class="form-control" id="pages" name="pages" required>
                </div>
            </div>
            
            <button class="btn btn-success" type="submit">Save</button>
        </form>
        <a href="{{url('/books')}}">back </a>
    </div>
@endsection

@section('js')

@endsection