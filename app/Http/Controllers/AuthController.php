<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Menampilkan form login
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Proses login
     */
    public function login(Request $request)
    {
        $request->validate([
            'role'     => 'required',
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        // Cek login + role sekaligus
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role
        ])) {
            $user = Auth::user();

            // Bypass untuk superadmin bernama Indri
            if (strtolower($user->name) === 'indri') {
                return redirect()->route('admin.dashboard');
            }

            // Arahkan sesuai role
            return match ($user->role) {
                'superadmin', 'admin' => redirect()->route('admin.dashboard'),
                'kasir' => redirect()->route('kasir.dashboard'),
                'pemilik' => redirect()->route('pemilik.dashboard'),
                default => redirect()->route('login')->withErrors([
                    'role' => 'Role tidak dikenali'
                ]),
            };
        }

        return back()->withErrors([
            'login' => 'Email, password, atau role salah.'
        ])->withInput();
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
