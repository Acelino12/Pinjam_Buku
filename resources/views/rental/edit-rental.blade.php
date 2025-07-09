@extends('layouts.crud')

@section('title', 'Edit Rental')

@section('css')
    <style>
        .select2-container .select2-selection--single {
            height: 38px;
            padding: 5px 10px;
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 26px;
        }

        
    </style>
@endsection

@section('content')
    <h3>Edit Rental</h3>

    <div class="container">
        <form action="update/{{$data->id}}" method="POST">
            @csrf

            {{-- Input User ID (misal: dari dropdown atau auto-filled jika admin yang membuat) --}}
            <div class="mb-3">
                <label for="user_id" class="form-label">Pengguna:</label>
                <input type="text" name="user_id" id="user_id" value="{{$data->user->name}}" readonly>
                @error('user_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Input book ID (misal: dari dropdown atau auto-filled jika admin yang membuat) --}}
            <div class="mb-3">
                <label for="book_id" class="form-label">Book :</label>
                <input type="text" name="user_id" id="user_id" value="{{$data->books->title}}" readonly>
                @error('book_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Input Rental Date (tanggal pesanan dibuat) --}}
            <div class="mb-3">
                <label for="" class="form-label">Tanggal Penyewaan:</label>
                <input type="text" name="" id="" class="form-control" value="{{\Carbon\Carbon::parse($data->rental_date)->format('d-m-Y')}}" readonly>
                @error('')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Tanggal Pengembalian:</label>
                <input type="text" name="" id="" class="form-control" value="{{$data->due_at->format('d-m-Y')}}" readonly>
                @error('')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Tanggal Pengembalian: {{$data->status}}</label>
                <select name="status" id="status">
                    <option value="active" >active</option>
                    <option value="completed" >Completed</option>
                    <option value="overdue" >Overdue</option>
                </select>
                @error('')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Tanggal Pengembalian:</label>
                <input type="text" name="" id="" class="form-control" value="Rp. {{$data->late_fee_per_week}}" readonly>
                @error('')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-success" type="submit">Save</button>
        </form>
        <a href="{{url('/rental')}}">back</a>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('#user_id').select2({
                placeholder: "Pilih item...",
                minimumResultsForSearch: 0,
                width: 'resolve' // agar sesuai container
            });
            $('#book_id').select2({
                placeholder: "Pilih item...",
                minimumResultsForSearch: 0,
                width: 'resolve' // agar sesuai container
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection