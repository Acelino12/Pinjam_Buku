@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <h3>Login</h3>
    <form action="{{url('/auth')}}" method="GET">
        @csrf
        <div class="form-grup">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required />
            @error('email')
                <p class="error-line">email tidak ditemukan</p>
            @enderror
        </div>
        <div class="form-grup">
            <label for="password">Password :</label>
            <input type="password" id="password" name="password" required />
            @error('password')
                <p class="error-line">password salah</p>
            @enderror
        </div>
        <button type="submit">Login</button>

    </form>
    <div class="forget">
        <p>lupa <a href="/">password</a></p>
        <p>belum punya <a href="{{url(('/register'))}}">akun</a> ?</p>
    </div>
@endsection