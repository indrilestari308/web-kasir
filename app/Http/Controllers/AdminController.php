<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function kategori()
    {
        // Ambil semua data kategori dari database
        $adminkategori = Kategori::all();
        return view('admin.kategori', compact('adminkategori'));
    }


    public function users()
    {
        return view('admin.users');
    }

    public function create()
    {
        // Tampilkan form tambah kategori
        return view('admin.createkategori');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string'
        ]);

        // Simpan kategori ke database
        Kategori::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        // Redirect kembali ke halaman data kategori
        return redirect()->route('admin.kategori')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function produk()
    {
        $produks = \App\Models\Produk::with('kategori')->get();
        return view('admin.produk', compact('produks'));
    }

    public function createProduk()
    {
        $kategoris = \App\Models\Kategori::all();
        return view('admin.createproduk', compact('kategoris'));
    }

    public function storeProduk(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'nama'        => 'required|string|max:255',
            'kode'        => 'required|string|max:100',
            'stok'        => 'required|integer|min:0',
            'harga_beli'  => 'required|integer|min:0',
            'harga_jual'  => 'required|integer|min:0',
            'status'      => 'required|in:aktif,nonaktif',
        ]);

        \App\Models\Produk::create([
            'kategori_id' => $request->kategori_id,
            'nama'        => $request->nama,
            'kode'        => $request->kode,
            'stok'        => $request->stok,
            'harga_beli'  => $request->harga_beli,
            'harga_jual'  => $request->harga_jual,
            'status'      => $request->status,
        ]);

        return redirect()->route('admin.produk')->with('success', 'Produk berhasil ditambahkan');
    }


}
