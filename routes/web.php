<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
HEAD
use App\Http\Controllers\TransaksiController;
=======
use App\Http\Controllers\DashboardController;
 c7f5b70f69e5438743d8036533b785eaf716b2ea

// LOGIN & LOGOUT
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ======================= ADMIN =======================
Route::middleware(['auth', 'role:admin,superadmin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Kategori
    Route::get('/kategori', [AdminController::class, 'kategori'])->name('admin.kategori');
    Route::get('/kategori/tambah', [AdminController::class, 'create'])->name('admin.kategori.create');
    Route::post('/kategori', [AdminController::class, 'store'])->name('admin.kategori.store');

    // Produk
    Route::get('/produk', [AdminController::class, 'produk'])->name('admin.produk');
    Route::get('/produk/tambah', [AdminController::class, 'createProduk'])->name('admin.produk.create');
    Route::post('/produk', [AdminController::class, 'storeProduk'])->name('admin.produk.store');

    // Users
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
});

HEAD
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::post('/transaksi/hitung', [TransaksiController::class, 'hitung'])->name('transaksi.hitung');




=======
// ======================= KASIR =======================
Route::middleware(['auth', 'role:kasir'])->prefix('kasir')->group(function () {
    Route::get('/dashboard', [KasirController::class, 'dashboard'])->name('kasir.dashboard');
    Route::get('/transaksi', [KasirController::class, 'transaksi'])->name('kasir.transaksi');
});
c7f5b70f69e5438743d8036533b785eaf716b2ea

// ======================= PEMILIK =======================
Route::middleware(['auth', 'role:pemilik'])->prefix('pemilik')->group(function () {
    Route::get('/dashboard', [PemilikController::class, 'dashboard'])->name('pemilik.dashboard');
    Route::get('/laporan', [PemilikController::class, 'laporan'])->name('pemilik.laporan');
});

// ======================= SEARCH =======================
Route::get('/search', function (Request $request) {
    $query = $request->input('q');
    return "Kamu mencari: " . $query;
})->name('search');
