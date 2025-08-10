<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavbarController extends Controller
{
    public function admin()
    {
        return view('admin.navbar');
    }

    public function kasir()
    {
        return view('kasir.navbar');
    }
}
