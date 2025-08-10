<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Aplikasi Kasir</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome (ikon) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Custom Style -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar-brand {
            font-weight: bold;
            letter-spacing: 1px;
        }

        .nav-link {
            color: #ffffff !important;
            transition: background-color 0.3s ease;
        }

        .nav-link:hover {
            background-color: #343a40;
            border-radius: 5px;
        }

        main.container {
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
            border-radius: 10px;
        }

        .btn-danger {
            padding: 5px 12px;
            font-size: 14px;
        }

        footer {
            text-align: center;
            padding: 15px;
            margin-top: 40px;
            color: #888;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/dashboard"><i class="fas fa-cash-register me-1"></i> KasirApp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    @auth
                        @if(auth()->user()->role == 'admin')
                            <li class="nav-item"><a class="nav-link" href="/produk"><i class="fas fa-boxes me-1"></i>Produk</a></li>
                            <li class="nav-item"><a class="nav-link" href="/user"><i class="fas fa-users me-1"></i>User</a></li>
                        @elseif(auth()->user()->role == 'kasir')
                            <li class="nav-item"><a class="nav-link" href="/transaksi"><i class="fas fa-shopping-cart me-1"></i>Transaksi</a></li>
                        @elseif(auth()->user()->role == 'pemilik')
                            <li class="nav-item"><a class="nav-link" href="/laporan"><i class="fas fa-chart-line me-1"></i>Laporan</a></li>
                        @endif

                        <li class="nav-item ms-3">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin logout?')">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mt-4 mb-5">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        &copy; {{ date('Y') }} KasirApp. All rights reserved.
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
