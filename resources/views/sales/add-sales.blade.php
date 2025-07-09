@extends('layouts.crud')

@section('title', 'New sale')

@section('css')

@endsection

@section('content')
    <h3>Create new Sale</h3>

    <div class="container">
        <form action="{{url('/addsales')}}" method="POST">
            @csrf

            {{-- code sales --}}

            {{-- menampilkan daftar user_id --}}
            <div class="mb-3">
                <label for="name">Name :</label>
                <input type="text" id="name" name="name" required>
                @error('name')
                    <p class='error-line'>{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="bio">bio :</label>
                <textarea type="text" id="bio" name="bio" required>
                </textarea>
                @error('bio')
                    <p class='error-line'>{{$message}}</p>
                @enderror
            </div>

            {{-- alamat ambil dari user --}}

            {{-- buat bisa input 2 buku lebih --}}

            {{-- book id --}}
            {{-- jumlah 1 buku --}}

            {{-- total harga --}}

            <button class="btn btn-success" type="submit">Save</button>
        </form>
        <a href="{{url('/sales')}}">back</a>
    </div>
@endsection

@section('js')

@endsection