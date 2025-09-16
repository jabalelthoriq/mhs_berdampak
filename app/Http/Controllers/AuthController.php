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

        // Log untuk debugging
        Log::info('Login attempt for email: ' . $request->email);

        // Cari user berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Jika user tidak ada
        if (!$user) {
            Log::warning('User not found: ' . $request->email);
            return redirect()->back()->with('swal', [
                'type' => 'error',
                'title' => 'Login Gagal!',
                'text' => 'Email tidak ditemukan.'
            ]);
        }

        // Cek password
        if (!Hash::check($request->password, $user->password)) {
            Log::warning('Wrong password for: ' . $request->email);
            return redirect()->back()->with('swal', [
                'type' => 'error',
                'title' => 'Login Gagal!',
                'text' => 'Password salah.'
            ]);
        }

        // Login user
        Auth::login($user, $request->has('remember'));

        // Regenerate session untuk keamanan
        $request->session()->regenerate();

        Log::info('User logged in successfully: ' . $user->email);
        Log::info('User role: ' . ($user->role ?? 'no role'));

        // PERBAIKAN UTAMA: Redirect langsung tanpa intended()
        try {
            if (method_exists($user, 'isAdmin') && $user->isAdmin()) {
                Log::info('Redirecting to admin dashboard');
                return redirect('/dashboard')->with('swal', [
                    'type' => 'success',
                    'title' => 'Selamat Datang!',
                    'text' => 'Selamat datang Admin!',
                    'timer' => 2000
                ]);
            } elseif (method_exists($user, 'isPetugas') && $user->isPetugas()) {
                Log::info('Redirecting to petugas dashboard');
                return redirect('/petugas/dashboard')->with('swal', [
                    'type' => 'success',
                    'title' => 'Selamat Datang!',
                    'text' => 'Selamat datang Petugas!',
                    'timer' => 2000
                ]);
            }
        } catch (\Exception $e) {
            Log::error('Error in role checking: ' . $e->getMessage());
        }

        // Default redirect
        Log::info('Redirecting to default dashboard');
        return redirect('/dashboard')->with('swal', [
            'type' => 'success',
            'title' => 'Login Berhasil!',
            'text' => 'Anda berhasil masuk ke sistem.',
            'timer' => 2000
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('swal', [
            'type' => 'success',
            'title' => 'Logout Berhasil!',
            'text' => 'Anda telah keluar dari sistem.',
            'timer' => 2000
        ]);
    }
}
