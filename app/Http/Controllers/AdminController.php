<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        return view('admin.dashboard');
    }

    public function kategori()
    {
        $adminkategori = Kategori::all();  // Ambil semua data kategori dari database
        return view('admin.kategori', compact('adminkategori'));
    }


    public function produk()
    {
        // Mengambil data produk beserta kategori-nya menggunakan relasi
        $produks = Produk::with('kategori')->get();

        return view('admin.produk', compact('produks'));
    }

    public function users() {
        return view('admin.users');
    }

    public function create()
    {
        return view('admin.tambahproduk');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);


        Kategori::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);


        return redirect()->route('admin.kategori')->with('success', 'Kategori berhasil ditambahkan!');
    }

}



