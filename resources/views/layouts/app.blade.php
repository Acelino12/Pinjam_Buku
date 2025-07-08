<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>BukuKita | @yield('title')</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        a {
            text-decoration: none;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            min-height: 100vh;
            background-color: #f4f4f4;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #e74c3c;
            color: white;
            padding: 20px;
            flex-shrink: 0;
            height: 100vh;
            transition: width 0.3s ease;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .sidebar.collapsed {
            width: 70px;
        }

        .sidebar h2 {
            font-size: 22px;
            margin-bottom: 30px;
            white-space: nowrap;
            transition: opacity 0.3s ease;
        }

        .sidebar.collapsed h2 {
            opacity: 0;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            flex-grow: 1;
        }

        .sidebar ul li {
            margin-bottom: 20px;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            display: block;
            padding: 8px 12px;
            border-radius: 6px;
            transition: background 0.3s ease;
            white-space: nowrap;
        }

        .sidebar ul li a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .toggle-btn {
            background-color: rgba(255, 255, 255, 0.1);
            border: none;
            color: white;
            padding: 10px;
            cursor: pointer;
            width: 100%;
            text-align: left;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        main {
            flex: 1;
            padding: 1em;
            transition: margin-left 0.3s ease;
            border: 3px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 2px black;
            margin: 1em;
        }

        .card {
            background-color: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        * Responsive tweaks */ @media (max-width: 768px) {
            .sidebar {
                position: absolute;
                z-index: 999;
                height: 100%;
                left: -250px;
            }

            .sidebar.show {
                left: 0;
            }

            .toggle-btn {
                text-align: center;
            }

        }

        footer {
            width: 100%;
            text-align: center;
            margin-bottom: 20px;
            padding: 20px;
        }
    </style>

    @yield('css')

</head>

<body>

    <div class="sidebar" id="sidebar">
        <button class="toggle-btn" onclick="toggleSidebar()">☰</button>
        {{-- <h2 id="logo">BukuKita</h2> --}}
        {{-- <p>halo, {{Auth::admins()->name}}</p> --}}
        <br>
        <ul>
            @if(Auth::guard('admins')->check())
                <p>Halo Admin, {{ Auth::guard('admins')->user()->name }}</p>
            @endif

            <li><a href="{{url('/home')}}">Dashboard</a></li>
            <li><a href="{{url('/sales')}}">Sales</a></li>
            <li><a href="{{url("/rental")}}">Rental</a></li>
            <li><a href="{{url("/users")}}">Users</a></li>
            <li><a href="{{url('/profil')}}">Profil</a></li>
            <li><a href="{{url('/books')}}">Books</a></li>
            <li><a href="{{url('/authors')}}">Authors</a></li>
            <li><a href="{{url('/publishers')}}">Publishers</a></li>
            <li><a href="{{url('/countrys')}}">Country</a></li>
            <li><a href="{{url('/setting')}}">Pengaturan</a></li>
            <li><a href="{{url('/logout')}}">logout</a></li>
            {{-- <li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Keluar
                </a>
            </li> --}}
        </ul>
        <footer class="bg-gray-200 text-center p-4 mt-8">
            &copy; {{ date('Y') }} BukuKita.
        </footer>
    </div>

    <main>
        @yield('content')
    </main>


</body>

@yield('js')

</html>