<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class SettingController
{

     public function __construct()
    {
        $this->checkAdminAccess();
    }
     private function checkAdminAccess()
    {
         if (!Auth::guard('admin')->check()) {
            abort(403, 'Unauthorized access');
        }

        // Check if midwife has admin role
        $user = Auth::guard('admin')->user();

        // Check if role field exists, is not null, and is set to 'admin'
        if (!isset($user->role) || $user->role === null || empty($user->role) || $user->role !== 'admin') {
            abort(403, 'admin access required');
        }
    }
    public function index()
    {
       $user = Auth::guard('admin')->user(); // ambil user yang sedang login
    return view('setting', compact('user'));
    }



public function updateProfile(Request $request)
{
    $user = Auth::guard('admin')->user();

    $request->validate([
        'name'   => 'required|string|max:100',
        'email'  => 'required|email|unique:users,email,' . $user->user_id . ',user_id',
        'phone'  => 'nullable|string|max:15',
        'alamat' => 'nullable|string|max:255',
        'foto'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    // Update field
    $user->name   = $request->name;
    $user->email  = $request->email;
    $user->phone  = $request->phone;
    $user->alamat = $request->alamat;

    // Upload foto jika ada
    if ($request->hasFile('foto')) {
        $fileName = time().'_'.$request->foto->getClientOriginalName();
        $request->foto->move(public_path('uploads/profile'), $fileName);
        $user->foto = 'uploads/profile/'.$fileName;
    }

    $user->save();

    return redirect()->route('setting')->with('success', 'Profil berhasil diperbarui!');
}

public function updatePassword(Request $request)
{
    $user = Auth::guard('admin')->user();

    $request->validate([
        'current_password'      => 'required',
        'new_password'          => 'required|min:6|confirmed',
    ]);

    // cek password lama
    if (!\Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'Password lama salah.']);
    }

    // update password
    $user->password = bcrypt($request->new_password);
    $user->save();

    return redirect()->route('setting')->with('success', 'Password berhasil diubah!');
}


    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['success' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    // Form reset password (akses via link email)
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.reset-password', [
            'token' => $token,
            'email' => $request->email,
        ]);
    }

    // Proses simpan password baru
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token'    => 'required',
            'email'    => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('success', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

}
