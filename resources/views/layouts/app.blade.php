<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SembakoMantap</title>

    @vite(['resources/sass/app.scss','resources/js/app.js'])

    <style>
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
        }

        .sidebar {
            width: 220px;
            background-color: #2c3e50;
            color: white;
            padding: 20px 0;
            flex-shrink: 0;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 1.4rem;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 10px 20px;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
        }

        .sidebar ul li a:hover {
            background-color: #34495e;
            border-radius: 5px;
        }

        .main-content {
            flex-grow: 1;
            background-color: #ecf0f1;
            padding: 20px;
        }

        .navbar {
            background-color: #2980b9;
            color: white;
            padding: 10px 20px;
            margin-bottom: 20px;
        }

        .navbar h4 {
            margin: 0;
        }
    </style>
</head>
<body>

    {{-- Sidebar --}}
    <div class="sidebar">
        <h2>Point Of Sale</h2>
        <ul>
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Data Produk</a></li>
            <li><a href="#">Stock</a></li>
            <li><a href="#">Transaksi</a></li>
            <li><a href="#">Tambah User</a></li>
            <li><a href="#">Ganti Foto</a></li>
            <li><a href="#">Ganti Password</a></li>
            <li><a href="#">Keluar</a></li>
        </ul>
    </div>

    {{-- Main Content --}}
    <div class="main-content">
        <div class="navbar">
            <h4>UD. SWALAYAN MAJU MANDIRI</h4>
        </div>

        @yield('content')
    </div>

</body>
</html>
