<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BukuKita | @yield('title')</title>
    <style>
        body {
            padding: 0;
            margin: 0;
        }

        header {
            background-color: aqua;
            width: 100%;
            height: auto;
            padding: 10px;
        }

        header a {
            text-decoration: none;
            font-family: 'Courier New', Courier, monospace;
            font-size: 3ch;
        }

        footer {
            width: 100%;
            text-align: center;
            margin-bottom: 20px;
        }

        .container {
            background: #fff;
            padding: 2em;
            border-radius: 8px;
            box-shadow: 0 2px 4px black;
            max-width: 600px;
            margin: 8em auto;
        }

        h3 {
            text-align: center;
        }

        .form-grup {
            margin-bottom: 3em;
        }

        .error {
            width: 85%;
            height: auto;
            margin: 10px;
            padding: 10px;
            align-items: center;
            background-color: #be340a
        }

        .error-line {
            color: #c0392b;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: medium;
        }

        label {
            display: block;
            margin-bottom: 0.5em;
            font-weight: bold;
        }

        input {
            width: 100%;
            background-color: rgb(255, 255, 255);
            padding: 5px;
            height: 20px;
            border-radius: 5px;
        }

        button {
            background-color: #28a745;
            color: white;
            padding: 0.8em 1.5em;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
            display: block;
            margin: auto;
            width: 95%;
        }

        .forget {
            text-align: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .forget a {
            text-decoration: none;
            color: rgb(31, 127, 216);
        }

        /* Styling dasar untuk select box */
        .custom-select-wrapper {
            position: relative;
            /* Penting untuk posisi panah kustom */
            width: 100%;
            /* Agar wrapper mengambil lebar penuh */
        }

        .custom-select-wrapper select {
            /* Reset default browser styles */
            -webkit-appearance: none;
            /* Untuk Chrome, Safari, Opera */
            -moz-appearance: none;
            /* Untuk Firefox */
            appearance: none;
            /* Standar */

            /* Desain dasar */
            width: 100%;
            padding: 10px 15px;
            /* Padding dalam, perhatikan ruang untuk panah */
            border: 1px solid #d1d5db;
            /* Warna border default (mirip gray-300 Tailwind) */
            border-radius: 0.375rem;
            /* Border radius (mirip rounded-md Tailwind) */
            background-color: #ffffff;
            /* Latar belakang putih */
            font-size: 1rem;
            /* Ukuran font */
            line-height: 1.5;
            /* Tinggi baris */
            color: #374151;
            /* Warna teks (mirip gray-700 Tailwind) */
            cursor: pointer;
            /* Kursor pointer saat di-hover */
            outline: none;
            /* Hilangkan outline default saat focus */

            /* Transisi untuk efek hover/focus yang halus */
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        /* Efek saat select di-hover */
        .custom-select-wrapper select:hover {
            border-color: #9ca3af;
            /* Border sedikit lebih gelap saat hover */
        }

        /* Efek saat select di-focus */
        .custom-select-wrapper select:focus {
            border-color: #6366f1;
            /* Warna border saat focus (mirip indigo-500 Tailwind) */
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
            /* Shadow saat focus */
        }

        /* Styling untuk panah kustom */
        .custom-select-wrapper::after {
            content: '▼';
            /* Karakter panah ke bawah (bisa diganti dengan SVG icon) */
            position: absolute;
            top: 50%;
            right: 15px;
            /* Jarak dari kanan */
            transform: translateY(-50%);
            /* Posisikan vertikal di tengah */
            pointer-events: none;
            /* Agar klik tembus ke select box di bawahnya */
            color: #4b5563;
            /* Warna panah */
            font-size: 0.75rem;
            /* Ukuran panah */
        }


        /* Jika Anda ingin panah berubah saat select dibuka/di-focus (opsional) */
        /* Ini lebih sulit tanpa JavaScript, karena :checked/:selected tidak berlaku untuk select */
        /* Biasanya, panah kustom tidak berputar kecuali dengan JS */
    </style>

    @yield('css')

</head>

<body>
    <header>
        <a href="/login" class="">BukuKita</a>
    </header>

    <main>

        <div class="container">
            @if ($errors->any())
                <div class="error" role="alert">
                    <strong class="font-bold">Oops!</strong>
                    <span class="block sm:inline">Ada beberapa masalah dengan input Anda:</span>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('content')
        </div>

    </main>

    <footer>
        &copy; {{ date('Y') }} BukuKita App.
    </footer>

</body>

@yield('js')

</html>