@extends('layouts.crud')

@section('title', 'add country')

@section('content')
    <h3>country</h3>
    <form action="{{url('countrys/addcountry')}}" method="POST">
        @csrf
        <div class="form-grup">
            <label for="name">Country :</label>
            <input type="name" id="name" name="name" />
            @error('name')
                <P class="error-line">{{$message}}</P>
            @enderror
        </div>
        <button type="submit">Save</button>

    </form>
    <div class="forget">
        <a href="{{url(('/countrys'))}}">back</a>
    </div>
@endsection