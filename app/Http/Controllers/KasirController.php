<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk; // pastikan model Produk ada

class KasirController extends Controller
{
    public function dashboard() {
        return view('kasir.dashboard');
    }

    public function transaksi() {
        $produks = Produk::all(); // ambil semua produk
        return view('kasir.transaksi', compact('produks'));
    }
}
