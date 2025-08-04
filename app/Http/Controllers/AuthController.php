<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $role = $request->input('role');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role !== $role) {
                Auth::logout();
                return back()->withErrors(['role' => 'Peran tidak sesuai dengan akun.']);
            }

            // Redirect berdasarkan role
            return match ($role) {
                'admin' => redirect()->route('dashboard.admin'),
                'kasir' => redirect()->route('dashboard.kasir'),
                'owner', 'pemilik' => redirect()->route('dashboard.pemilik'),
                default => redirect('/'),
            };
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function showRegisterForm()
    {
        return view('auth.register'); // Buat file auth.register kalau belum ada
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:owner,admin,kasir',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('login')->with('success', 'Berhasil mendaftar, silakan login.');
    }

    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password'); // Buat file jika ingin custom
    }

    // Jika pakai Socialite:
    public function redirectToGoogle()
    {
        return \Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = \Socialite::driver('google')->user();
        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            ['name' => $googleUser->getName(), 'password' => bcrypt('google-login'), 'role' => 'owner']
        );
        Auth::login($user);
        return redirect()->route('dashboard.pemilik');
    }
}


