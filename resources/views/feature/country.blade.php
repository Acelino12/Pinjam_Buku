@extends('layouts.app')

@section('title', 'country')

@section('content')
    <h3>country</h3>
    <a href="{{url('/newcountry')}}" class="btn btn-primary">tambah data</a>
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
                        <a href="userdelete/{{$item->id}}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection