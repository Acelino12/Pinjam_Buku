@extends('layouts.app')

@section('title', 'Sales')

@section('content')
    <h3>Sales</h3>
    <br>
    <a href="/newsales" class="btn btn-primary">tambah data</a>
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
                <th>Book</th>
                <th>Status</th>
                <th>Payment Status</th>
                <th>Button</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datasales as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->code_purchase}}</td>
                    <td>{{$item->user_id}}</td>
                    <td>{{$item->book_id}}</td>
                    <td>{{$item->status}}</td>
                    <td>{{$item->payment_status}}</td>
                    <td>
                        <a href="saledetail/{{$item->id}}">Detail</a>
                        <a href="/{{$item->id}}">Jadwal</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection