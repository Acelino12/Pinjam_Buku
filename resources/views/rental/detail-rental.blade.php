@extends('layouts.crud')

@section('title', 'Detail Rental')

@section('css')
    <style>
        .form-row {
            display: flex;
            align-items: center;
        }

        .form-row label {
            width: 100px;
            font-weight: bold;
        }

        .form-row input,textarea {
            flex: 1;
            padding: 5px;
        }
    </style>
@endsection

@section('content')
    <h3>Detail Rental</h3>

    <div class="container">
        <form method="GET">
            @csrf

            <div class="form-row">
                <label for="code_rent">Code :</label>
                <input type="text" name="code_rent" id="code_rent" value="{{$rental->code_rent}}" readonly>
                @error('code_rent')
                    <p class='error-line'>{{$message}}</p>
                @enderror
            </div>

            {{-- <pre>{{ json_encode($rental, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre> --}}
            
            <div class="form-row">
                <label for="name">Peminjam :</label>
                <input type="text" id="name" name="name" value="{{$rental->user->name}}" readonly>
                @error('name')
                    <p class='error-line'>{{$message}}</p>
                @enderror
            </div>

            <div class="form-row">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" value="{{$rental->user->email}}" readonly>
                @error('email')
                    <p class='error-line'>{{$message}}</p>
                @enderror
            </div>

            <div class="form-row">
                <label for="name">buku :</label>
                <input type="text" id="name" name="name" value="{{$rental->books->title}}" readonly>
                @error('name')
                    <p class='error-line'>{{$message}}</p>
                @enderror
            </div>

            <div class="form-row">
                <label for="address">Alamat: </label>
                <textarea >{{$rental->user->address}}</textarea>
                @error('address')
                    <p class='error-line'>{{$message}}</p>
                @enderror
            </div>

            <div class="form-row">
                <label for="date_of_birth">Tanggal peminjaman :</label>
                {{-- Input tipe date akan menampilkan kalender --}}
                <input type="text" id="date_of_birth" name="date_of_birth" 
                value="{{$rental->rental_date}}" readonly />
                @error('date_of_birth')
                    <P class="error-line"> {{$message}}</P>
                @enderror
            </div>

            <div class="form-row">
                <label for="date_of_birth">Tanggal pengembalian :</label>
                {{-- Input tipe date akan menampilkan kalender --}}
                <input type="text" id="date_of_birth" name="date_of_birth" 
                value="{{$rental->due_at}}" readonly />
                @error('date_of_birth')
                    <P class="error-line"> {{$message}}</P>
                @enderror
            </div>

            <div class="form-row">
                <label for="place_of_birth">Tempat lahir :</label>
                <input type="text" name="place_of_birth" id="place_of_birth" value="{{$rental->status}}" readonly>
                @error('place_of_birth')
                    <p class='error-line'>{{$message}}</p>
                @enderror
            </div>

            <div class="form-row">
                <label for="phone">No Hp :</label>
                <input type="number" name="phone" id="phone" value="{{$rental->user->phone}}" readonly>
                @error('phone')
                    <p class='error-line'>{{$message}}</p>
                @enderror
            </div>

        </form>
        <a class="" href="{{url('/rental')}}">Back</a>
    </div>
@endsection

@section('js')

@endsection