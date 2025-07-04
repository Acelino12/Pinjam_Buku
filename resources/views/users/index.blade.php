@extends('layouts.app')

@section('title', 'users')

@section('css')

@endsection

@section('content')
    <a href="/newuser" class="btn btn-primary">tambah data</a>
    <a href="/softdelete" class="btn btn-primary">Data terhapus</a>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Code</th>
                <th>Status pembelian</th>
                <th>Status penyewaan</th>
                <th>Button</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datausers as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->code_user}}</td>
                    <td>
                        @if ($item->can_buy == 1)
                            <span style="color:green"> True</span>
                        @else
                            <span style="color:red">False</span>
                        @endif
                    </td>
                    <td>
                        @if ($item->can_rent == 1)
                            <span style="color:green"> True</span>
                        @else
                            <span style="color:red">False</span>
                        @endif
                    </td>
                    <td>
                        <a href="userdetails/{{$item->id}}">Detail</a>
                        <a href="userdelete/{{$item->id}}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('js')

@endsection