@extends('layouts.app')

@section('title', 'dashboard')

@section('css')
    <style>
        .items-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            gap: 20px; 
        }

        .item {
            background-color: #e74c3c;
            height: 180px;
            color: white;
            padding: 20px;
            margin: 10px;
            flex: 1;
            border-radius: 10px;
            transition: width 0.3s ease;
            overflow: hidden;
            flex-direction: column;
        }

        .item h4,h1{
            text-align: center;
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        .grafik-items {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            gap: 20px; 
        }

        .grafik-items .grafik {
            background-color: #e74c3c;
            height: 500px;
            color: white;
            padding: 20px;
            margin: 10px;
            flex: 1;
            border-radius: 10px;
            transition: width 0.3s ease;
            overflow: hidden;
            flex-direction: column;
        }

    </style>
@endsection

@section('content')
    <h3>Dashboard</h3>
    <br>

    <div class="items-container">
        <div class="item">
            <h4>Rental</h4>
            <h1>{{$rental}}</h1>
        </div>
        <div class="item">
            <h4>User</h4>
            <h1>{{$user}}</h1>
        </div>
        <div class="item">
            <h4>Book</h4>
            <h1>{{$book}}</h1>
        </div>
        <div class="item">
            <h4>Book</h4>
        </div>
    </div>
    {{-- <a href="{{url('countrys/newcountry')}}" class="btn btn-primary">tambah data</a> --}}
    <br>

    <div class="grafik-items">
        <div class="grafik"></div>
        <div class="grafik"></div>
    </div>

@endsection

@section('js')

@endsection