@extends('layouts.app')

@section('title', 'country')

@section('content')
    <h3>country</h3>
    <br>
    <a href="{{url('countrys/newcountry')}}" class="btn btn-primary">tambah data</a>
    <br>
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{Session::get('success')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Button</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($country as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->name}}</td>
                    <td>
                        <a href="countrys/delete/{{$item->id}}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection