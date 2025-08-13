<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    // Tampilkan semua produk
    public function index()
    {
        $produks = Produk::with('kategori')->get();
        return view('admin.produk', compact('produks'));
    }

    // Form tambah produk
    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.tambahproduk', compact('kategori'));
    }

    // Simpan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'nama'        => 'required|string|max:255',
            'kode'        => 'required|string|max:50|unique:produk,kode',
            'stok'        => 'required|integer|min:0',
            'harga_beli'  => 'required|numeric|min:0',
            'harga_jual'  => 'required|numeric|min:0',
            'status'      => 'required|in:aktif,nonaktif',
        ]);

        Produk::create($request->all());

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // Form edit produk
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::all();
        return view('admin.tambahproduk', compact('produk', 'kategori'));
    }

    // Update produk
    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'nama'        => 'required|string|max:255',
            'kode'        => 'required|string|max:50|unique:produk,kode,' . $produk->id,
            'stok'        => 'required|integer|min:0',
            'harga_beli'  => 'required|numeric|min:0',
            'harga_jual'  => 'required|numeric|min:0',
            'status'      => 'required|in:aktif,nonaktif',
        ]);

        $produk->update($request->all());

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui!');
    }

    // Hapus produk
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}
