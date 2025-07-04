@extends('layouts.crud')

@section('title', 'new publisher')

@section('css')

@endsection

@section('content')
    <h3>Create new Author</h3>

    <div class="container">
        <form action="{{url('/addauthor')}}" method="POST">
            @csrf

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

            <div class="mb-3">
                <label for="date_of_birth">Alamat :</label>
                <input type="date" id="date_of_birth" name="date_of_birth" required>
                @error('date_of_birth')
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
        <a href="{{url('/authors')}}">back</a>
    </div>
@endsection

@section('js')

@endsection