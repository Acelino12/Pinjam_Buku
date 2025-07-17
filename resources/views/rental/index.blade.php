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

        .button {
            width: 110px;
            padding: 5px;
            justify-content: center;
            display: flex;
        }

        .btn-detail {
            background-color: #007bff;
            /* Primer Blue */
            color: white;
            /* Warna teks putih agar kontras */
            border: 1px solid #007bff;
            /* Border yang cocok */
            padding: 8px;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
            /* Agar tombol tidak mengambil lebar penuh */
            margin-right: 5px;
            /* Jarak antar tombol */
        }

        .btn-detail:hover {
            background-color: #0056b3;
            /* Sedikit lebih gelap saat hover */
            border-color: #0056b3;
        }

        /* Untuk tombol Update (hijau) */
        .btn-update {
            background-color: #28a745;
            /* Success Green */
            color: white;
            border: 1px solid #28a745;
            padding: 8px;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
        }

        .btn-update:hover {
            background-color: #218838;
            /* Sedikit lebih gelap saat hover */
            border-color: #218838;
        }
    </style>
@endsection

@section('content')
    <h3>Rental</h3>
    <br>
    <a href="/rental/newrental" class="btn btn-primary">tambah data</a>
    @if ($view == true)
        <a href="/rental" class="btn btn-primary">Back</a>
    @else
        <a href="rental/completed" class="btn btn-primary">Completed</a>
    @endif
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
                        <div class="button">
                            <a class="btn-detail" href="/rental/rentdetail/{{$item->id}}">Detail</a>
                            @if ($item->status != 'completed')
                                <a class="btn-update" href="/rental/rentupdate/{{$item->id}}">Update</a>
                            @endif
                        </div>
                    </td>
                    {{-- <td>
                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                            data-bs-target="#rentalOrderDetailModal" onclick="showRentalOrderDetails({{ $item->id }})">
                            Detail
                        </button>
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- <div class="modal fade" id="rentalOrderDetailModal" tabindex="-1" aria-labelledby="rentalOrderDetailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rentalOrderDetailModalLabel">Detail Pesanan Sewa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Nama Pengguna:</strong> <span id="modalUserName"></span></p>
                    <p><strong>Tanggal Sewa:</strong> <span id="modalRentalDate"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div> --}}

@endsection

@section('js')
    <script>
        // // Anda bisa menempatkan ini di resources/js/app.js atau di dalam <script> di Blade file Anda
        // document.addEventListener('DOMContentLoaded', () => {
        //     window.showRentalOrderDetails = async (itemId) => {
        //         try {
        //             const response = await fetch(`/rental/${itemId}/details`);
        //             if (!response.ok) {
        //                 throw new Error(`HTTP error! status: ${response.status}`);
        //             }
        //             const orderDetails = await response.json();

        //             // Mengisi data ke modal
        //             document.getElementById('modalUserName').textContent = orderDetails.user_name;
        //             document.getElementById('modalRentalDate').textContent = orderDetails.rental_date;

        //             // Bootstrap 5+ akan secara otomatis menampilkan modal karena data-bs-toggle="modal"
        //             // Namun, jika Anda memicu modal secara manual tanpa atribut data-bs-toggle/target,
        //             // Anda akan menggunakan kode berikut:
        //             // const myModal = new bootstrap.Modal(document.getElementById('rentalOrderDetailModal'));
        //             // myModal.show();
        //         } catch (error) {
        //             console.error('Error fetching rental order details:', error);
        //             alert('Gagal mengambil detail pesanan sewa. Silakan coba lagi.');
        //         }
        //     };

        //     // Untuk menutup modal, cukup gunakan data-bs-dismiss="modal" pada tombol Tutup
        //     // atau jika Anda ingin menutup secara programatis:
        //     // window.hideRentalOrderDetails = () => {
        //     //    const myModal = bootstrap.Modal.getInstance(document.getElementById('rentalOrderDetailModal'));
        //     //    if (myModal) myModal.hide();
        //     // };
        // });
    </script>
@endsection