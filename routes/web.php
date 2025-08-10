<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facedes\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\ProdukController;


Route::get('/login', function () {
    return view('auth.login');
})->name('login');



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


Route::get('/password/reset', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');





