@extends('layouts.crud')

@section('title', 'add country')

@section('content')
    <h3>country</h3>
    <form action="{{url('/addcountry')}}" method="POST">
        @csrf
        <div class="form-grup">
            <label for="name">Country :</label>
            <input type="name" id="name" name="name" />
        </div>
        <button type="submit">Save</button>

    </form>
    <div class="forget">
        <a href="{{url(('/countrys'))}}">back</a>
    </div>
@endsection