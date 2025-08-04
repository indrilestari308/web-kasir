@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Dashboard Admin</h1>

    {{-- Informasi Kunci --}}
    <div class="row">
        {{-- Kategori --}}
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Total Kategori</h5>
                    <p class="card-text display-6">0</p>
                    <a href="#" class="text-white">Lihat kategori</a>
                </div>
            </div>
        </div>

        {{-- Produk --}}
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Total Produk</h5>
                    <p class="card-text display-6">0</p>
                    <a href="#" class="text-white">Lihat produk</a>
                </div>
            </div>
        </div>

        {{-- Users --}}
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Total Pengguna</h5>
                    <p class="card-text display-6">0</p>
                    <a href="#" class="text-white">Lihat pengguna</a>
                </div>
            </div>
        </div>

        {{-- Penjualan --}}
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h5 class="card-title">Penjualan Hari Ini</h5>
                    <p class="card-text display-6">Rp 0</p>
                    <a href="#" class="text-white">Lihat laporan</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Grafik dan Laporan --}}
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card border-info">
                <div class="card-body">
                    <h5 class="card-title">Grafik Penjualan</h5>
                    <p>Grafik belum tersedia.</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card border-secondary">
                <div class="card-body">
                    <h5 class="card-title">Aktivitas Terbaru</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Belum ada aktivitas terbaru.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
