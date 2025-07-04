<!DOCTYPE html>
<html>
<head>
    <title>422 - data tidak valid </title>
    <style>
        body {
            font-family: sans-serif;
            text-align: center;
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <h1>422</h1>
    <p>Data yang dikirim tidak valid (validation error).</p>
    {{$error->any()}}
</body>
</html>
