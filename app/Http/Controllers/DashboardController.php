<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $role = auth()->user()->role;

        return match ($role) {
            'admin' => view('admin.dashboard'),
            'kasir' => view('kasir.dashboard'),
            'pemilik' => view('pemilik.dashboard'),
            default => abort(403)
        };
    }
}
