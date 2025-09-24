<?php

namespace App\Http\Controllers;
use App\Models\Masyarakat;
use App\Models\KunjunganKesehatan;
use App\Models\Imunisasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController
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
        $totalMasyarakat = Masyarakat::count();
        $totalKunjunganKesehatan = KunjunganKesehatan::count();
        $totalImunisasi = Imunisasi::count();

         $masyarakat = Masyarakat::orderBy('created_at', 'desc')->paginate(5, ['*'], 'masyarakat_page');
         $kunjungan = KunjunganKesehatan::orderBy('created_at', 'desc')->paginate(5, ['*'], 'masyarakat_page');
         $imunisasi = Imunisasi::orderBy('tanggal_imunisasi', 'asc')->paginate(5, ['*'], 'masyarakat_page');

         return view('dashboard',compact('masyarakat', 'kunjungan', 'imunisasi'),[
            'totalMasyarakat' => $totalMasyarakat,
            'totalKunjunganKesehatan' => $totalKunjunganKesehatan,
            'totalImunisasi' => $totalImunisasi,
            'activePage' => 'dashboard'
        ]);
    }
    

    public function test()
    {
        return view('test');
    }
}
