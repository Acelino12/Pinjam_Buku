@extends('layouts.app')

@section('title', 'Rental')

@section('content')
    <h3>Rental</h3>
    <br>
    <a href="newrental" class="btn btn-primary">tambah data</a>
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
                <th>Code</th>
                <th>Name</th>
                <th>Jatuh Tempo</th>
                <th>Status</th>
                <th>Button</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datarental as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->code_rent}}</td>
                    <td>{{$item->user->name}}</td>
                    <td>{{$item->due_at}}</td>
                    <td>{{$item->status}}</td>
                    <td>
                        <a href="rental/rentdetail/{{$item->id}}">Detail</a>
                        <a href="rental/rentupdate/{{$item->id}}">Update</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection