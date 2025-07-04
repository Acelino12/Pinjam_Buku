
<!DOCTYPE html>
<html>
<head>
    <title>401 - belum login</title>
    <style>
        body {
            font-family: sans-serif;
            text-align: center;
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <h1>401</h1>
    <p>Client tidak terautentikasi belum login.</p>
    <a href="{{ url('/login') }}">Kembali ke Beranda</a>
</body>
</html>
