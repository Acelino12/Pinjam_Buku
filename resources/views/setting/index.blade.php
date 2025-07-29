@extends('layouts.app')

@section('title', 'Setting')

@section('css')
    <style>
        .items-container .item::hover{
            background-color: #7a1509;
        }
        
        .item {
            background-color: #e74c3c;
            height: 60px;
            color: white;
            padding: 20px;
            margin: 5px;
            border-radius: 2px;
            transition: width 0.3s ease;
            overflow: hidden;
        }

        .item h4,
        h1 {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }
    </style>
@endsection

@section('content')
    <h3>Dashboard</h3>
    <br>

    <div class="items-container">
        <a href="/profil">
            <div class="item">
                <h4>Rental</h4>
            </div>
        </a>
        <div class="item">
            <h4>Rental</h4>
        </div>
        <div class="item">
            <h4>Rental</h4>
        </div>
    </div>

@endsection

@section('js')

@endsection