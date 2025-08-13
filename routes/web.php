<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;

Route::resource('kategori', KategoriController::class);


// LOGIN & LOGOUT
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ADMIN
Route::middleware(['auth', 'role:admin,superadmin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/kategori', [AdminController::class, 'kategori'])->name('admin.kategori');
    Route::get('/admin/produk', [AdminController::class, 'produk'])->name('admin.produk');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');

    Route::get('/admin/kategori/tambah', [AdminController::class, 'create'])->name('kategori.create');
    Route::post('/admin/kategori', [AdminController::class, 'store'])->name('kategori.store');

    Route::get('/admin/produk/tambah', [AdminController::class, 'createProduk'])->name('produk.create');
    Route::post('/admin/produk/store', [AdminController::class, 'store'])->name('produk.store');
    Route::get('/admin/produk/{id}/edit', [AdminController::class, 'edit'])->name('produk.edit');
    Route::delete('/admin/produk/{id}', [AdminController::class, 'destroy'])->name('produk.destroy');

});

// KASIR
Route::middleware(['auth', 'role:kasir'])->group(function () {
    Route::get('/kasir/dashboard', [KasirController::class, 'dashboard'])->name('kasir.dashboard');
    Route::get('/kasir/transaksi', [KasirController::class, 'transaksi'])->name('kasir.transaksi');
});

// PEMILIK
Route::middleware(['auth', 'role:pemilik'])->group(function () {
    Route::get('/pemilik/dashboard', [PemilikController::class, 'dashboard'])->name('pemilik.dashboard');
    Route::get('/pemilik/laporan', [PemilikController::class, 'laporan'])->name('pemilik.laporan');
});

Route::get('/search', function (Request $request) {
    $query = $request->input('q');
    return "Kamu mencari: " . $query;
})->name('search');

