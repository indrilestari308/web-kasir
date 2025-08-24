<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $role = auth()->user()->role;

        return match ($role) {
            'admin' => $this->adminDashboard(),
            'kasir' => view('kasir.dashboard'),
            'pemilik' => view('pemilik.dashboard'),
            default => abort(403)
        };
    }

    private function adminDashboard()
    {
        $totalProduk     = Produk::count();
        $totalKategori   = Kategori::count();
        $totalPengguna   = User::count();
        $produkBaruHari  = Produk::whereDate('created_at', today())->count();

        return view('admin.dashboard', compact(
            'totalProduk',
            'totalKategori',
            'totalPengguna',
            'produkBaruHari'
        ));
    }
}
