<?php

namespace App\Http\Controllers;
use App\Models\Masyarakat;
use App\Models\KunjunganKesehatan;
use App\Models\Imunisasi;
use App\Models\Kehamilan;

use Illuminate\Http\Request;

class DataController
{
    public function index(Request $request)
    {
        
    $masyarakatPage = $request->get('masyarakat_page', 1);
    $masyarakat = Masyarakat::paginate(10, ['*'], 'masyarakat_page', $masyarakatPage);


    $kunjunganPage = $request->get('kunjungan_page', 1);
    $kunjungan = KunjunganKesehatan::with('masyarakat')->paginate(10, ['*'], 'kunjungan_page', $kunjunganPage);


    $kehamilanPage = $request->get('kehamilan_page', 1);
    $kehamilan = Kehamilan::paginate(10, ['*'], 'kehamilan_page', $kehamilanPage);


    $imunisasiPage = $request->get('imunisasi_page', 1);
    $imunisasi = Imunisasi::with('masyarakat')->paginate(10, ['*'], 'imunisasi_page', $imunisasiPage);

    return view('data', compact('masyarakat', 'kunjungan', 'kehamilan', 'imunisasi'));
    }
}
