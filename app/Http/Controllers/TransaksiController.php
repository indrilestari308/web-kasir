<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        return view('transaksi');
    }

    public function hitung(Request $request)
    {
        $harga = $request->input('harga');
        $jumlah = $request->input('jumlah');
        $diskonPersen = $request->input('diskon');

        // Hitung total sebelum diskon
        $totalSebelumDiskon = $harga * $jumlah;

        // Hitung nominal diskon
        $potongan = ($diskonPersen / 100) * $totalSebelumDiskon;

        // Hitung total bayar
        $totalBayar = $totalSebelumDiskon - $potongan;

        return view('transaksi', compact('harga', 'jumlah', 'diskonPersen', 'totalSebelumDiskon', 'potongan', 'totalBayar'));
    }
}


