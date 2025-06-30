@extends('layouts.auth')

@section('title', 'Register')

@section('css')
<style>
    .btn_regis {
        width: 100%;
        padding: 12px;
        border: none;
        background-color: #e74c3c;
        color: white;
        font-size: 16px;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn_regis:hover {
        background-color: #c0392b;
    }
</style>
@endsection

@section('content')

    <h3>Register</h3>
    <form action="{{url('postauth')}}" method="POST">
        @csrf
        <div class="form-grup">
            <label for="name">Name :</label>
            <input type="text" id="name" name="name" required/>
            @error('name')
                <p class="error-line">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-grup">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required/>
            @error('email')
                <p class="error-line">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-grup">
            <label for="password">Password :</label>
            <input type="password" id="password" name="password" required />
            @error('password')
                <p class="error-line">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-grup">
            <label for="password_confirmation">Konfirmasi Password :</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required />
            @error('password_confirmation')
                <p class="error-line">{{ $message }}</p>
            @enderror
        </div>
        {{-- <div class="form-grup">
            <label for="gender">gender :</label>
            <select class="custom-select-wrapper" id="gender" name="gender">
                <option value="man">Pria</option>
                <option value="woman">Wanita</option>
                <option value="other">lainnya</option>
            </select>
        </div>
        <div class="form-grup">
            <label for="country">country :</label>
            <select class="custom-select-wrapper" id="country" name="country">
                @foreach ($listcountry as $country)
                    <option value="{{$country->id}}">{{$country->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-grup">
            <label for="phone">Phone :</label>
            <input type="number" id="phone" name="phone" />
        </div> --}}
        <button type="submit" class="btn_regis">Regitser</button>
    </form>

@endsection