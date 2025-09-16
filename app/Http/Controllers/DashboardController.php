<?php

namespace App\Http\Controllers;
use App\Models\Masyarakat;
use App\Models\KunjunganKesehatan;
use App\Models\Imunisasi;
use Illuminate\Http\Request;

class DashboardController
{
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
    public function petugasDashboard()
    {
        return view('petugas.dashboard');
    }

    public function test()
    {
        return view('test');
    }
}
