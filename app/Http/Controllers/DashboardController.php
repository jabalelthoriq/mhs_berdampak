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
        $tahun = Carbon::now()->year;
        $bulanList = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];

        // ===========================
        //  DATA DASHBOARD
        // ===========================
        $totalOrangtua = Orangtua::count();
        $totalAnak     = Anak::count();
        $totalMasyarakat = $totalOrangtua + $totalAnak;

        $orangtua = Orangtua::where('jenis_penyakit', 'menular')
            ->orderBy('usia_orangtua', 'desc')
            ->paginate(100);

        $anak = Anak::whereIn('kesimpulan', ['Stunting', 'Gizi Kurang'])
            ->orderBy('usia_anak', 'desc')
            ->paginate(100);

        $pelayanan = Pelayanan::orderBy('tanggal_pelayanan', 'desc')
            ->paginate(5);

        // =====================================================
        //  CHART 1: GRAFIK GIZI ANAK (Stunting, Gizi Kurang, Gizi Baik)
        // =====================================================
        $chartGizi = Anak::select(
            DB::raw('MONTH(updated_at) as bulan'),
            DB::raw("SUM(CASE WHEN kesimpulan = 'Stunting' THEN 1 ELSE 0 END) as stunting"),
            DB::raw("SUM(CASE WHEN kesimpulan = 'Gizi Kurang' THEN 1 ELSE 0 END) as gizi_kurang"),
            DB::raw("SUM(CASE WHEN kesimpulan = 'Gizi Baik' THEN 1 ELSE 0 END) as gizi_baik")
        )
            ->whereYear('updated_at', $tahun)
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        // Siapkan array 12 bulan agar grafik tetap stabil meski data kosong
        $dataStunting = array_fill(0, 12, 0);
        $dataGiziKurang = array_fill(0, 12, 0);
        $dataGiziBaik = array_fill(0, 12, 0);

        foreach ($chartGizi as $row) {
            $index = $row->bulan - 1;
            $dataStunting[$index] = $row->stunting;
            $dataGiziKurang[$index] = $row->gizi_kurang;
            $dataGiziBaik[$index] = $row->gizi_baik;
        }

        // =====================================================
        //  CHART 2: GRAFIK PENYAKIT ORANGTUA (Menular vs Tidak Menular)
        // =====================================================
        $chartPenyakit = Orangtua::select(
            DB::raw('MONTH(updated_at) as bulan'),
            DB::raw("SUM(CASE WHEN jenis_penyakit = 'menular' THEN 1 ELSE 0 END) as menular"),
            DB::raw("SUM(CASE WHEN jenis_penyakit = 'tidak menular' THEN 1 ELSE 0 END) as tidak_menular")
        )
            ->whereYear('updated_at', $tahun)
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        $dataPenyakitMenular = array_fill(0, 12, 0);
        $dataPenyakitTidakMenular = array_fill(0, 12, 0);

        foreach ($chartPenyakit as $row) {
            $index = $row->bulan - 1;
            $dataPenyakitMenular[$index] = $row->menular;
            $dataPenyakitTidakMenular[$index] = $row->tidak_menular;
        }

        // =====================================================
        //  CHART 3: JUMLAH PELAYANAN PER BULAN
        // =====================================================
        $chartPelayanan = Pelayanan::select(
            DB::raw('MONTH(tanggal_pelayanan) as bulan'),
            DB::raw('COUNT(*) as total')
        )
            ->whereYear('tanggal_pelayanan', $tahun)
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan');

        $dataPelayanan = array_fill(0, 12, 0);
        foreach ($chartPelayanan as $bulan => $total) {
            $dataPelayanan[$bulan - 1] = $total;
        }

        return view('dashboard', compact(
            'orangtua',
            'anak',
            'pelayanan',

            // counter
            'totalMasyarakat',
            'totalAnak',
            'totalOrangtua',

            // chart gizi anak
            'bulanList',
            'dataStunting',
            'dataGiziKurang',
            'dataGiziBaik',

            // chart penyakit orangtua
            'dataPenyakitMenular',
            'dataPenyakitTidakMenular',

            // chart pelayanan
            'dataPelayanan'
        ));
    }


    public function test()
    {
        return view('test');
    }
}
