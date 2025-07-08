@extends('layouts.crud')

@section('title', 'new publisher')

@section('css')

@endsection

@section('content')
    <h3>Create new Publisher</h3>

    <div class="container">
        <form action="{{url('publishers/addpublisher')}}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name">Name :</label>
                <input type="text" id="name" name="name" required>
                @error('name')
                    <p class='error-line'>{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
                @error('email')
                    <p class='error-line'>{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="address">Alamat :</label>
                <input type="address" id="address" name="address" required>
                @error('address')
                    <p class='error-line'>{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="country_id">Negara: </label>
                <select name="country_id" id="country_id">
                    @foreach ($country as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                @error('country_id')
                    <p class='error-line'>{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="phone">No Telephone :</label>
                <input type="number" name="phone" id="phone">
                @error('phone')
                    <p class='error-line'>{{$message}}</p>
                @enderror
            </div>

            <div class="form-grup">
                <label for="web_url">Website :</label>
                {{-- Input tipe date akan menampilkan kalender --}}
                <input type="url" id="web_url" name="web_url" required />
                @error('web_url')
                    <P class="error-line"> {{$message}}</P>
                @enderror
            </div>

            <button class="btn btn-success" type="submit">Save</button>
        </form>
        <a href="{{url('/publisher')}}">back</a>
    </div>
@endsection

@section('js')

@endsection