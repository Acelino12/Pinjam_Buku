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
        <form 
        @if ($data->status != 'overdue')
            action="update/{{$data->id}}" 
        @else
            action="rentpayment/{{$data->id}}" 
        @endif
        method="POST">
            @csrf
            <div class="mb-3">
                <label for="user_id" class="form-label">Pengguna:</label>
                <input type="text" name="user_id" id="user_id" value="{{$data->user->name}}" readonly>
                @error('user_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="book_id" class="form-label">Book : {{$data->books->title}}</label>
                <input type="text" name="book_id" id="book_id" value="{{$data->books->id}}" readonly>
                @error('book_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Input Rental Date (tanggal pesanan dibuat) --}}
            <div class="mb-3">
                <label for="" class="form-label">Tanggal Penyewaan:</label>
                <input type="text" name="" id="" class="form-control"
                    value="{{\Carbon\Carbon::parse($data->rental_date)->format('d-m-Y')}}" readonly>
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
                <label for="dateNow" class="form-label">Tanggal Saat ini:</label>
                <input type="text" name="dateNow" id="dateNow" class="form-control" value="{{ date('d-m-Y') }}" readonly>
                @error('')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="lateStatus" class="form-label">keterlambatan:</label>
                <input type="text" name="lateStatus" id="lateStatus" class="form-control" value="{{$lateDays}} Hari"
                    readonly>
                @error('')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status: {{$data->status}}</label>
                @if ($data->status == 'active')
                    <select name="status" id="status">
                    <option value="active">active</option>
                    <option value="completed">Completed</option>
                </select>
                @endif
                @error('')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            @if ($lateDays > 0)
                <div class="mb-3">
                    <label for="" class="form-label">Denda keterlambatan:</label>
                    <input type="text" name="" id="" class="form-control" value="Rp. {{$data->total_late_fee}}" readonly>
                </div>
            @endif
            <button class="btn btn-success" type="submit">
                @if ($data->status == 'overdue')
                    Bayar
                @else
                    Save
                @endif
            </button>
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
        document.addEventListener('DOMContentLoaded', function () {
            const dueInput = document.getElementById('due_at');
            const nowInput = document.getElementById('dateNow');
            const output = document.getElementById('lateStatus');

            // Format: dd-mm-yyyy → ubah ke Date object
            function parseDate(str) {
                const [d, m, y] = str.split('-').map(Number);
                return new Date(y, m - 1, d);
            }

            const dueDate = parseDate(dueInput.value);
            const today = parseDate(nowInput.value);

            let lateText = 'Tidak terlambat';

            if (today > dueDate) {
                const diffInMs = today - dueDate;
                const diffInDays = Math.floor(diffInMs / (1000 * 60 * 60 * 24));

                if (diffInDays <= 7) {
                    lateText = 'Terlambat 1 minggu';
                } else if (diffInDays <= 14) {
                    lateText = 'Terlambat 2 minggu';
                } else if (diffInDays <= 21) {
                    lateText = 'Terlambat 3 minggu';
                } else {
                    lateText = `Terlambat lebih dari 3 minggu (${diffInDays} hari)`;
                }
            }

            output.value = lateText;
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection