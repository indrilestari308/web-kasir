<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        return view('admin.dashboard');
    }
     public function kategori()
    {
        return view('admin.kategori', compact('adminkategori'));
    }

    public function produk() {
        return view('admin.produk');
    }
    public function users() {
        return view('admin.users');
    }

    public function create()
    {
        return view('admin.tambahkategori');
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



