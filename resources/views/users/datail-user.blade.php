@extends('layouts.crud')

@section('title', 'User')

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
    <h3>Detail Users</h3>

    <div class="container">
        <form method="GET">
            @csrf

            <div class="form-row">
                <label for="code_user">Code :</label>
                <input type="text" name="code_user" id="code_user" value="{{$user->code_user}}" readonly>
                @error('code_user')
                    <p class='error-line'>{{$message}}</p>
                @enderror
            </div>
            
            <div class="form-row">
                <label for="name">Name :</label>
                <input type="text" id="name" name="name" value="{{$user->name}}" readonly>
                @error('name')
                    <p class='error-line'>{{$message}}</p>
                @enderror
            </div>

            <div class="form-row">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" value="{{$user->email}}" readonly>
                @error('email')
                    <p class='error-line'>{{$message}}</p>
                @enderror
            </div>

            <div class="form-row">
                <label for="date_of_birth">Tanggal Lahir :</label>
                {{-- Input tipe date akan menampilkan kalender --}}
                <input type="text" id="date_of_birth" name="date_of_birth" 
                value="{{ $date }}" readonly />
                @error('date_of_birth')
                    <P class="error-line"> {{$message}}</P>
                @enderror
            </div>

            <div class="form-row">
                <label for="place_of_birth">Tempat lahir :</label>
                <input type="text" name="place_of_birth" id="place_of_birth" value="{{$user->place_of_birth ?? '-'}}" readonly>
                @error('place_of_birth')
                    <p class='error-line'>{{$message}}</p>
                @enderror
            </div>

            <div class="form-row">
                <label for="age">usia :</label>
                <input type="text" name="age" id="age" value="{{$user->age ?? date('Y') - \Carbon\Carbon::parse($user->date_of_birth)->format('Y') }}" readonly>
                @error('age')
                    <p class='error-line'>{{$message}}</p>
                @enderror
            </div>

            <div class="form-row">
                <label for="gender">Gender :</label>
                @if ($user->gender == 'man')
                    <input value="Pria" />
                @elseif ($user->gender =='woman')
                    <input value="Wanita"/>
                @else
                    <input value="other"/>
                @endif
                
                @error('gender')
                    <p class='error-line'>{{$message}}</p>
                @enderror
            </div>

            <div class="form-row">
                <label for="phone">No Hp :</label>
                <input type="number" name="phone" id="phone" value="{{$user->phone}}" readonly>
                @error('phone')
                    <p class='error-line'>{{$message}}</p>
                @enderror
            </div>

            <div class="form-row">
                <label for="country_id">Negara: </label>
                <input value="{{$user->countries->name ?? '-'}}"/>
                @error('country_id')
                    <p class='error-line'>{{$message}}</p>
                @enderror
            </div>

            <div class="form-row">
                <label for="address">Alamat: </label>
                <textarea >{{$user->address ?? '-'}}</textarea>
                @error('address')
                    <p class='error-line'>{{$message}}</p>
                @enderror
            </div>

        </form>
        <a class="" href="{{url('/users')}}">Back</a>
    </div>
@endsection

@section('js')

@endsection