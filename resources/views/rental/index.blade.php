@extends('layouts.app')

@section('title', 'Rental')

@section('css')
    <style>
        .status {
            width: fit-content;
            height: fit-content;
            padding: 3px 6px 3px 6px;
            border-radius: 5px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;

        }
    </style>
@endsection

@section('content')
    <h3>Rental</h3>
    <br>
    <a href="rental/newrental" class="btn btn-primary">tambah data</a>
    <br>
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
                    <td>{{$item->due_at->format('d-m-Y')}}</td>
                    <td>
                        @if ($item->status == 'active')
                            <div class="status" style="background-color: yellow;">{{$item->status}}</div>
                        @elseif ($item->status == 'completed')
                            <div class="status" style="background-color:green; color: aliceblue;">{{$item->status}}</div>
                        @else
                            <div class="status" style="background-color: red;">{{$item->status}}</div>
                        @endif
                    </td>
                    <td>
                        <a href="rental/rentdetail/{{$item->id}}">Detail</a>
                        <a href="rental/rentupdate/{{$item->id}}">Update</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection