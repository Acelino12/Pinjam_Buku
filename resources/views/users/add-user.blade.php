@extends('layouts.crud')

@section('title', 'new users')

@section('css')

@endsection

@section('content')
    <h3>Create new User</h3>

    <div class="container">
        <form action="{{url('/adduser')}}" method="POST">
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

            <div class="form-grup">
                <label for="date_of_birth">Tanggal Lahir :</label>
                {{-- Input tipe date akan menampilkan kalender --}}
                <input type="date" id="date_of_birth" name="date_of_birth" required />
                @error('date_of_birth')
                    <P class="error-line"> {{$message}}</P>
                @enderror
            </div>

            <div class="mb-3">
                <label for="gender">Gender :</label>
                <select name="gender" id="gender">
                    <option value="man">Pria</option>
                    <option value="woman">Wanita</option>
                    <option value="other">other</option>
                </select>
                @error('gender')
                    <p class='error-line'>{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="phone">No Hp :</label>
                <input type="number" name="phone" id="phone">
                @error('phone')
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

            <button class="btn btn-success" type="submit">Save</button>
        </form>
    </div>
@endsection

@section('js')

@endsection