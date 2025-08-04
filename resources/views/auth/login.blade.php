<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login | SembakoMantap</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #f8f9fa;
    }

    .navbar-brand img {
      margin-right: 8px;
    }

    .login-container {
      max-width: 420px;
      margin: 80px auto;
      background: #ffffff;
      padding: 35px 30px;
      border-radius: 10px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }

    .brand-logo {
      display: block;
      margin: 0 auto 25px;
      max-width: 100px;
    }

    .login-container h4 {
      margin-bottom: 10px;
    }

    .login-container p {
      font-size: 0.95rem;
      margin-bottom: 25px;
    }

    .form-label {
      font-weight: 500;
    }

    .btn-google {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .btn-google img {
      margin-right: 8px;
    }

    @media (max-width: 576px) {
      .login-container {
        margin: 40px 15px;
        padding: 25px;
      }
    }
  </style>
</head>
<body>

  {{-- Navbar --}}
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="https://kasirpintar.co.id/images/logo.png" alt="Logo" width="30" height="30" />
        <span class="ms-2">SembakoMantap</span>
      </a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Fitur</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Kontak</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Produk</a></li>
        </ul>
      </div>
    </div>
  </nav>

  {{-- Form Login --}}
  <div class="login-container">

    <img src="https://kasirpintar.co.id/images/logo.png" alt="Logo" class="brand-logo" />

    <h4 class="text-center">Login Owner</h4>
    <p class="text-center">Belum punya akun? <a href="{{ route('register.form') }}">Daftar di sini</a></p>

    {{-- Error Alert --}}
    @if($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    {{-- Login Form --}}
    <form action="{{ route('login.process') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label for="role" class="form-label">Masuk Sebagai</label>
        <select class="form-select" name="role" required>
          <option value="owner">Owner</option>
          <option value="admin">Admin</option>
          <option value="kasir">Kasir</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">E-Mail</label>
        <input type="email" name="email" class="form-control" placeholder="E-Mail" required />
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" required />
      </div>

      <div class="d-grid mb-3">
        <button type="submit" class="btn btn-success">Masuk</button>
      </div>

      <div class="text-center mb-3">
        <a href="{{ route('password.request') }}">Lupa Password?</a>
      </div>

      <hr class="my-3"/>

      <div class="d-grid">
        <a href="{{ route('login.google') }}" class="btn btn-outline-dark btn-google">
          <img src="https://img.icons8.com/color/16/000000/google-logo.png" />
          Lanjutkan dengan Google
        </a>
      </div>
    </form>
  </div>

</body>
</html>
