@extends('layouts.crud')

@section('title', 'New Rental')

@section('css')
    <style>
        .select2 {
            width: 100%;
            height: 38px;
            /* setara input Bootstrap */
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
            padding: 5px 10px;
            font-size: 1rem;
        }
    </style>
@endsection

@section('content')
    <h3>Create new Rental</h3>

    <div class="container">
        <form action="{{url('rental/addrental')}}" method="POST">
            @csrf

            {{-- Input User ID (misal: dari dropdown atau auto-filled jika admin yang membuat) --}}
            <div class="mb-3">
                <label for="user_id" class="form-label">Pengguna:</label>
                <select name="user_id" id="user_id" class="select2" required>
                    @foreach($users as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->name }}
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Input book ID (misal: dari dropdown atau auto-filled jika admin yang membuat) --}}
            <div class="mb-3">
                <label for="book_id" class="form-label">Book :</label>
                <select name="book_id" id="book_id" class="select2" required>
                    @foreach($books as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->title }}
                        </option>
                    @endforeach
                </select>
                @error('book_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Input Rental Date (tanggal pesanan dibuat) --}}
            <div class="mb-3">
                <label for="" class="form-label">Tanggal Pesanan:</label>
                <input type="text" name="" id="" class="form-control"
                    value="{{$date}}" readonly>
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
                placeholder: "Pilih Pengguna",
                allowClear: true
            });
        });
    </script>
@endsection