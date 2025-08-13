@extends('layouts.app')

@section('content')
<style>
    .stat-card {
        border-radius: 15px;
        padding: 20px;
        transition: transform 0.2s ease-in-out;
        color: #fff;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 150px;
    }
    .stat-card:hover {
        transform: translateY(-5px);
    }
    .stat-icon {
        font-size: 2rem;
        opacity: 0.9;
    }
    /* Semua card warna seragam gradasi biru */
    .bg-dashboard {
        background: linear-gradient(135deg, #4e54c8, #8f94fb);
    }
    .stat-footer {
        font-size: 0.9rem;
        opacity: 0.85;
        border-top: 1px solid rgba(255,255,255,0.2);
        padding-top: 5px;
        margin-top: auto;
    }
    .stat-footer a {
        color: #fff;
        text-decoration: underline;
    }
</style>

<div class="row">
    <div class="col-md-3 mb-3">
        <div class="card shadow border-0 text-center stat-card bg-dashboard">
            <div>
                <div class="stat-icon mb-2">
                    <i class="bi bi-box-seam"></i>
                </div>
                <h5>Total Produk</h5>
                <h2>120</h2>
            </div>
            <div class="stat-footer">
                <a href="{{ url('/admin/produk') }}">Lihat semua produk</a>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card shadow border-0 text-center stat-card bg-dashboard">
            <div>
                <div class="stat-icon mb-2">
                    <i class="bi bi-tags"></i>
                </div>
                <h5>Kategori</h5>
                <h2>8</h2>
            </div>
            <div class="stat-footer">
                <a href="{{ url('/admin/kategori') }}">Kelola kategori</a>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card shadow border-0 text-center stat-card bg-dashboard">
            <div>
                <div class="stat-icon mb-2">
                    <i class="bi bi-people"></i>
                </div>
                <h5>Pengguna</h5>
                <h2>5</h2>
            </div>
            <div class="stat-footer">
                <a href="{{ url('/admin/users') }}">Lihat daftar pengguna</a>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card shadow border-0 text-center stat-card bg-dashboard">
            <div>
                <div class="stat-icon mb-2">
                    <i class="bi bi-bag-plus"></i>
                </div>
                <h5>Produk Baru Masuk</h5>
                <h2>15</h2>
            </div>
            <div class="stat-footer">
                <a href="{{ url('/produkbaru') }}">Detail produk baru</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endsection
