<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SarwodadiMantap</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Custom Style -->
    <style>
        body {
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #d0c5e0, #e6f0ff);
            background-attachment: fixed;
            position: relative;
            overflow-x: hidden;
        }

        /* Efek tambahan bentuk blur di background */
        body::before, body::after {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: rgba(111, 66, 193, 0.25);
            filter: blur(120px);
            z-index: -1;
            border-radius: 50%;
        }

        body::before {
            top: -100px;
            left: -150px;
        }

        body::after {
            bottom: -150px;
            right: -150px;
            background: rgba(142, 99, 227, 0.25);
        }


        .navbar {
            background: linear-gradient(90deg, #6f42c1, #8e63e3);
            box-shadow: 0 3px 10px rgba(0,0,0,0.15);
        }

        .navbar-brand, .nav-link {
            color: #fff !important;
        }

        .navbar-brand:hover, .nav-link:hover {
            opacity: 0.85;
        }

        footer {
            background: transparent; /* Hapus warna background */
            color: #6f42c1; /* Warna teks disesuaikan agar tetap terlihat */
            padding: 15px 0;
            text-align: center;
            margin-top: auto;
            border-top: 1px solid rgba(111, 66, 193, 0.2); /* Garis tipis pemisah */
        }

        footer small {
            font-size: 0.9rem;
            opacity: 0.8;
        }



        .container-main {
            padding-top: 20px;
            min-height: calc(100vh - 120px);
        }
    </style>


    @stack('styles')
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">Swalayan Sarwodadi</a>
        <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Menu kiri -->
            <ul class="navbar-nav ms-auto align-items-lg-center">
                @auth
                    @if(Auth::user()->role == 'admin')
                        @include('admin.navbar')
                    @elseif(Auth::user()->role == 'kasir')
                        @include('kasir.navbar')
                    @elseif(Auth::user()->role == 'pemilik')
                        @include('pemilik.navbar')
                    @endif
                @endauth

                <!-- Form Pencarian -->
                <form class="d-flex ms-lg-3 mt-2 mt-lg-0" method="GET" action="{{ route('search') }}">
                    <input class="form-control form-control-sm me-2" type="search" name="q" placeholder="Cari..." aria-label="Search">
                    <button class="btn btn-light btn-sm" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </ul>
        </div>
    </div>
</nav>


    <!-- Main Content -->
    <div class="container container-main">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <small>&copy; {{ date('Y') }} Web Kasir. All rights reserved.</small>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>
</html>
