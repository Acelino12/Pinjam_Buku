<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BukuKita | @yield('title')</title>
    <style>
        * {
            margin: auto;
            padding: 1em;
        }

        main {
            width: 70%;
            border-radius: 8px;
            box-shadow: 0 2px 2px black;
        }

        main h3{
            text-align: center;
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

        select{
            width: 100%;
        }

        .error-line {
            color: red;
            font-family: monospace;
            font-style: italic;
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
            width: 30%;
        }
    </style>
    @yield('css')
</head>

<body>
    <main>
        @yield('content')
    </main>
</body>

@yield('js')

</html>