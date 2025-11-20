<?php

namespace App\Http\Controllers;
use App\Models\anak;
use App\Models\orangtua;
use App\Models\pelayanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
    $tahunSekarang = Carbon::now()->year;

    // === DATA DASAR ===
    $totalOrangtua = Orangtua::count();
    $totalAnak = Anak::count();
    $totalMasyarakat = $totalOrangtua + $totalAnak;

    // === FILTER DATA TABEL ===
    $orangtua = Orangtua::where('riwayat_penyakit', 'menular')
        ->orderBy('usia_orangtua', 'desc')
        ->paginate(5);

    $anak = Anak::whereIn('kesimpulan', ['Stunting', 'Gizi Kurang'])
        ->orderBy('usia_anak', 'desc')
        ->paginate(5);

    $pelayanan = Pelayanan::orderBy('tanggal_pelayanan', 'desc')
        ->paginate(5);

    // === CHART: Kesimpulan Anak per Bulan (1 Tahun) ===
    $chartKesimpulan = Anak::select(
        DB::raw('MONTH(created_at) as bulan'),
        DB::raw("SUM(CASE WHEN kesimpulan = 'Stunting' THEN 1 ELSE 0 END) as stunting"),
        DB::raw("SUM(CASE WHEN kesimpulan = 'Gizi Kurang' THEN 1 ELSE 0 END) as gizi_kurang"),
        DB::raw("SUM(CASE WHEN kesimpulan = 'Gizi Baik' THEN 1 ELSE 0 END) as gizi_baik")
    )
        ->whereYear('created_at', $tahunSekarang)
        ->groupBy('bulan')
        ->orderBy('bulan')
        ->get();

    // Pisahkan data untuk chart.js
    $bulanLabels = [];
    $dataStunting = [];
    $dataGiziKurang = [];
    $dataGiziBaik = [];

    $namaBulan = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];

    foreach ($chartKesimpulan as $row) {
        $bulanLabels[] = $namaBulan[$row->bulan - 1];
        $dataStunting[] = $row->stunting;
        $dataGiziKurang[] = $row->gizi_kurang;
        $dataGiziBaik[] = $row->gizi_baik;
    }

    // === CHART: Riwayat Penyakit Orangtua per Bulan ===
$chartPenyakit = Orangtua::select(
    DB::raw('MONTH(created_at) as bulan'),
    DB::raw("SUM(CASE WHEN riwayat_penyakit = 'menular' THEN 1 ELSE 0 END) as menular"),
    DB::raw("SUM(CASE WHEN riwayat_penyakit = 'tidak menular' THEN 1 ELSE 0 END) as tidak_menular")
)
    ->whereYear('created_at', $tahunSekarang)
    ->groupBy('bulan')
    ->orderBy('bulan')
    ->get();

$bulanLabels = [];
$dataStunting = [];
$dataGiziKurang = [];
$dataGiziBaik = [];
$dataPenyakitMenular = [];
$dataPenyakitTidakMenular = [];

$namaBulan = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];

foreach ($chartKesimpulan as $row) {
    $bulanLabels[] = $namaBulan[$row->bulan - 1];
    $dataStunting[] = $row->stunting;
    $dataGiziKurang[] = $row->gizi_kurang;
    $dataGiziBaik[] = $row->gizi_baik;
}

foreach ($chartPenyakit as $row) {
    $dataPenyakitMenular[] = $row->menular;
    $dataPenyakitTidakMenular[] = $row->tidak_menular;
}


    // === CHART: Jumlah Pelayanan per Bulan ===
    $chartPelayanan = Pelayanan::select(
        DB::raw('MONTH(tanggal_pelayanan) as bulan'),
        DB::raw('COUNT(*) as total')
    )
        ->whereYear('tanggal_pelayanan', $tahunSekarang)
        ->groupBy('bulan')
        ->orderBy('bulan')
        ->pluck('total', 'bulan');

    return view('dashboard', compact(
        'orangtua',
        'anak',
        'pelayanan',
        'totalMasyarakat',
        'totalAnak',
        'totalOrangtua',
        'chartKesimpulan',
        'chartPenyakit',
        'chartPelayanan',
        'dataPenyakitMenular',
        'dataPenyakitTidakMenular',
        'bulanLabels',
        'dataStunting',
        'dataGiziKurang',
        'dataGiziBaik'
    ));
}

    public function test()
    {
        return view('test');
    }
}
