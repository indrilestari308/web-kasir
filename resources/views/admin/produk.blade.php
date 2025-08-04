@extends('admin.navbar')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Manajemen Produk</h2>

    <div class="row">
        <!-- Fitur 1: Manajemen Produk -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">Manajemen Produk</h5>
                    <p class="card-text">Menampilkan daftar produk dengan detail lengkap.</p>
                    <a href="#" class="btn btn-primary w-100">Lihat Produk</a>
                </div>
            </div>
        </div>

        <!-- Fitur 2: Tambah Produk -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">Penambahan Produk</h5>
                    <p class="card-text">Tambahkan produk baru ke katalog Anda.</p>
                    <a href="#" class="btn btn-success w-100">Tambah Produk</a>
                </div>
            </div>
        </div>

        <!-- Fitur 3: Edit Produk -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">Pengeditan Produk</h5>
                    <p class="card-text">Edit informasi produk yang sudah ada.</p>
                    <a href="#" class="btn btn-warning w-100">Edit Produk</a>
                </div>
            </div>
        </div>

        <!-- Fitur 4: Hapus Produk -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">Penghapusan Produk</h5>
                    <p class="card-text">Hapus produk yang sudah tidak tersedia.</p>
                    <a href="#" class="btn btn-danger w-100">Hapus Produk</a>
                </div>
            </div>
        </div>

        <!-- Fitur 5: Stok Produk -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">Pengelolaan Stok</h5>
                    <p class="card-text">Kelola dan pantau stok produk secara real-time.</p>
                    <a href="#" class="btn btn-secondary w-100">Kelola Stok</a>
                </div>
            </div>
        </div>

        <!-- Fitur 6: Gambar Produk -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">Pengelolaan Gambar</h5>
                    <p class="card-text">Unggah dan atur gambar produk dengan mudah.</p>
                    <a href="#" class="btn btn-info w-100">Atur Gambar</a>
                </div>
            </div>
        </div>

        <!-- Fitur 7: Harga Produk -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">Pengaturan Harga</h5>
                    <p class="card-text">Tetapkan dan ubah harga produk kapan saja.</p>
                    <a href="#" class="btn btn-primary w-100">Atur Harga</a>
                </div>
            </div>
        </div>

        <!-- Fitur 8: Kategori Produk -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">Kategori Produk</h5>
                    <p class="card-text">Kelompokkan produk berdasarkan kategori.</p>
                    <a href="#" class="btn btn-success w-100">Kelola Kategori</a>
                </div>
            </div>
        </div>

        <!-- Fitur 9: Pencarian Produk -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">Pencarian Produk</h5>
                    <p class="card-text">Cari produk berdasarkan kata kunci atau kriteria.</p>
                    <a href="#" class="btn btn-warning w-100">Cari Produk</a>
                </div>
            </div>
        </div>

        <!-- Fitur 10: Filter Produk -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">Filter Produk</h5>
                    <p class="card-text">Filter produk berdasarkan status atau kategori.</p>
                    <a href="#" class="btn btn-secondary w-100">Filter Produk</a>
                </div>
            </div>
        </div>

        <!-- Fitur 11: Integrasi Sistem -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">Integrasi Sistem</h5>
                    <p class="card-text">Terhubung dengan sistem lain seperti pemesanan dan inventaris.</p>
                    <a href="#" class="btn btn-dark w-100">Lihat Integrasi</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
