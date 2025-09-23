<?php

namespace App\Http\Controllers;
use App\Models\Masyarakat;
use App\Models\KunjunganKesehatan;
use App\Models\Imunisasi;
use App\Models\Kehamilan;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DataController
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
    public function index(Request $request)
{
    $masyarakatPage = $request->get('masyarakat_page', 1);
    $masyarakat = Masyarakat::orderBy('created_at', 'desc')
        ->paginate(10, ['*'], 'masyarakat_page', $masyarakatPage);

    $kunjunganPage = $request->get('kunjungan_page', 1);
    $kunjungan = KunjunganKesehatan::with('masyarakat')
        ->orderBy('tanggal_kunjungan', 'desc')
        ->paginate(10, ['*'], 'kunjungan_page', $kunjunganPage);

    $kehamilanPage = $request->get('kehamilan_page', 1);
    $kehamilan = Kehamilan::orderBy('usia_kehamilan', 'desc')
        ->paginate(10, ['*'], 'kehamilan_page', $kehamilanPage);

    $imunisasiPage = $request->get('imunisasi_page', 1);
    $imunisasi = Imunisasi::with('masyarakat')
        ->orderBy('tanggal_imunisasi', 'desc')
        ->paginate(10, ['*'], 'imunisasi_page', $imunisasiPage);

    return view('data', compact('masyarakat', 'kunjungan', 'kehamilan', 'imunisasi'));
}

}
