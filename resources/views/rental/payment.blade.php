@extends('layouts.crud')

@section('title', 'Payment')

@section('css')
    <style>
        .form {
            width: 100%;
            display: flex;
            /* Tambahkan ini untuk Flexbox */
            align-items: flex-start;
            /* Mengatur item agar sejajar di bagian atas */
            gap: 15px;
            /* Memberikan jarak antar item secara horizontal */
        }

        .form img{
            width:100px; 
            height: 140px; 
            /* background-color: aqua;  */
            object-fit: cover; 
            margin-right: 5px; 
            border-radius: 5px;
        }

        .tag {
            /* background-color: red; */
        }
    </style>
@endsection

@section('content')
    <h3>Payment</h3>

    <div class="container">
        <form action="update/{{$dataRent->id}}" method="POST">
            @csrf

            <div class="form">
                <div style="width: 20%">
                    <img src="URL_GAMBAR_BUKU_ANDA" alt="Cover Buku">
                </div>
                <div class="tag" style="width: 80%">
                    <label for="book_id" class="">Book :</label>
                    <p class="">{{ $dataRent->books->title }}</p>
                </div>
            </div>

            <div class="mb-3">
                <label for="user_id" class="form-label">Pengguna:</label>
                <input type="text" name="user_id" id="user_id" value="{{$dataRent->user->name}}" readonly>
                @error('user_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Tanggal Pengembalian:</label>
                <input type="text" name="" id="" class="form-control" value="{{$dataRent->due_at->format('d-m-Y')}}"
                    readonly>
                @error('')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="lateStatus" class="form-label">keterlambatan:</label>
                <input type="text" name="lateStatus" id="lateStatus" class="form-control" value="{{$lateDays}}" readonly>
                @error('')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Denda keterlambatan:</label>
                <input type="text" name="" id="" class="form-control" value="Rp. {{$dataRent->late_fee_per_week}}" readonly>
            </div>
            <button class="btn btn-success" type="submit">Payment</button>
        </form>
        <a href="{{url('/rental')}}">back</a>
    </div>
@endsection

@section('js')
@endsection