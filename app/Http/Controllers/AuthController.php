<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
{
    $request->validate([
        'email'    => 'required|email',
        'password' => 'required'
    ]);

    $credentials = $request->only('email', 'password');
    $remember    = $request->has('remember');

    // Log untuk debugging
    \Log::info('Login attempt for email: ' . $request->email);

    // Coba autentikasi dengan guard admin
    if (Auth::guard('admin')->attempt($credentials, $remember)) {
        $request->session()->regenerate();
        $user = Auth::guard('admin')->user();

        \Log::info('User logged in successfully: ' . $user->email);
        \Log::info('User role: ' . ($user->role ?? 'no role'));

        // Redirect berdasarkan role
        if ($user->isAdmin()) {
            \Log::info('Redirecting to admin dashboard');
            return redirect('/dashboard')->with('swal', [
                'type'  => 'success',
                'title' => 'Selamat Datang!',
                'text'  => 'Selamat datang Admin!',
                'timer' => 2000
            ]);
        } elseif ($user->isPetugas()) {
            \Log::info('Redirecting to petugas dashboard');
            return redirect('/petugas/dashboard')->with('swal', [
                'type'  => 'success',
                'title' => 'Selamat Datang!',
                'text'  => 'Selamat datang Petugas!',
                'timer' => 2000
            ]);
        }

        // Default
        return redirect('/dashboard')->with('swal', [
            'type'  => 'success',
            'title' => 'Login Berhasil!',
            'text'  => 'Anda berhasil masuk ke sistem.',
            'timer' => 2000
        ]);
    }

    // Kalau login gagal
    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ])->withInput($request->except('password'));
}


    public function logout(Request $request)
{
    // Logout dari guard admin
    Auth::guard('admin')->logout();

    // Hapus session
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login')->with('swal', [
        'type'  => 'success',
        'title' => 'Logout Berhasil!',
        'text'  => 'Anda telah keluar dari sistem.',
        'timer' => 2000
    ]);
}

}
