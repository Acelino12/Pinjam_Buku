@extends('layouts.app')

@section('title', 'users')

@section('css')

@endsection

@section('content')
    <h2>Books</h2>
    <br>
    <a href="/books/newbook" class="btn btn-primary">tambah data</a>
    <a href="/books/softdelete" class="btn btn-primary">Data terhapus</a>
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
                <th>Title</th>
                <th>Code Book</th>
                <th>Sales</th>
                <th>Rental</th>
                <th>Button</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->code_book}}</td>
                    <td>
                        @if ($item->is_saleable == 1)
                            <span style="color:green"> True</span>
                        @else
                            <span style="color:red">False</span>
                        @endif
                    </td>
                    <td>
                        @if ($item->is_rentable == 1)
                            <span style="color:green"> True</span>
                        @else
                            <span style="color:red">False</span>
                        @endif
                    </td>
                    <td>
                        <a href="/books/bookdetail/{{$item->id}}">Detail</a>
                        <a href="/books/bookdelete/{{$item->id}}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('js')

@endsection