<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facedes\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;



Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
Route::get('/admin/navbar', [NavbarController::class, 'admin'])->name('admin.navbar');
Route::get('/admin/produk', [ProdukController::class, 'produk'])->name('admin.produk');


Route::get('/password/reset', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');



Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::post('/transaksi/hitung', [TransaksiController::class, 'hitung'])->name('transaksi.hitung');






