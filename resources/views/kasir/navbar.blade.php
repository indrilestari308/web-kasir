<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SembakoMantap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    /* Reset dasar */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f8f9fa;
        color: #212529;
    }

    /* Navbar Atas */
    .navbar {
        height: 60px;
        background-color: #343a40;
        color: #ffffff;
        padding: 0 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .navbar h4 {
        font-size: 18px;
        margin: 0;
    }

    /* Sidebar Kiri */
    .sidebar {
        position: fixed;
        top: 60px; /* sesuai tinggi navbar */
        left: 0;
        width: 220px;
        height: calc(100vh - 60px);
        background-color: #212529;
        padding-top: 20px;
        overflow-y: auto;
        border-right: 1px solid #2c2f33;
    }

    .sidebar a {
        display: block;
        padding: 12px 20px;
        color: #adb5bd;
        text-decoration: none;
        transition: all 0.2s;
    }

    .sidebar a:hover,
    .sidebar a.active {
        background-color: #495057;
        color: #ffffff;
        border-left: 4px solid #0d6efd;
    }

    /* Konten Utama */
    .main-content {
        margin-top: 60px;
        margin-left: 220px;
        padding: 30px;
        min-height: calc(100vh - 60px);
        background-color: #f8f9fa;
    }

    /* Kartu Statistik */
    .card {
        border: none;
        border-radius: 8px;
        background-color: #ffffff;
        transition: 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .card-body h6 {
        font-size: 14px;
        color: #6c757d;
    }

    .card-body h4 {
        font-size: 22px;
        margin-top: 5px;
    }

    /* Tombol Logout */
    .btn-danger {
        margin-top: 20px;
        width: 80%;
    }

    /* Responsive (opsional) */
    @media (max-width: 768px) {
        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
        }

        .main-content {
            margin-left: 0;
        }

        .navbar {
            flex-direction: column;
            height: auto;
            align-items: flex-start;
        }
    }
</style>

</head>
<body>

    <!-- NAVBAR -->
    <div class="navbar fixed-top">
        <h4>KASIR SWALAYAN MAJU MANDIRI</h4>
        <span>Admin Panel</span>
    </div>

    <!-- SIDEBAR -->
    <div class="sidebar">

        <a href="#"></a>
        <form action="{{ url('/logout') }}" method="POST" class="text-center mt-3">
            @csrf
            <button class="btn btn-danger btn-sm">Keluar</button>
        </form>
    </div>


    <!-- MAIN CONTENT -->
    <div class="main-content">
        @yield('content')
    </div>

</body>
</html>
