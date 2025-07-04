@extends('layouts.app')

@section('title', 'Authors')

@section('css')
    <style>
        .button-web {
            background-color: blue;
            width: fit-content;
            padding: 6px;
            border-radius: 5px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }

        .button-web:hover {
            background-color: rgb(11, 11, 156);
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            background-color: ;
        }

        .button-web a {
            color: white;
        }
    </style>
@endsection

@section('content')
    <h2>Author</h2><br>
    <a href="/newauthor" class="btn btn-primary">tambah data</a>
    <a href="/softdelete" class="btn btn-primary">Data terhapus</a>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Website</th>
                <th>Button</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataAuthors as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->name}}</td>
                    <td>
                        <div class="button-web">
                            <a href="{{$item->web_url}}" target="_blank">Website</a>
                        </div>
                    </td>
                    <td>
                        <a href="publisherdetails/{{$item->id}}">Detail</a>
                        <a href="publisherdelete/{{$item->id}}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('js')

@endsection