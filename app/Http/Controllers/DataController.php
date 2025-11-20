<?php

namespace App\Http\Controllers;
use App\Models\Masyarakat;
use App\Models\KunjunganKesehatan;
use App\Models\Imunisasi;
use App\Models\Kehamilan;
use Illuminate\Support\Facades\Auth;
use App\Models\Orangtua;
use App\Models\Anak;
use App\Models\Pelayanan;

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
    // $masyarakatPage = $request->get('masyarakat_page', 1);
    // $masyarakat = Masyarakat::orderBy('created_at', 'desc')
    //     ->paginate(10, ['*'], 'masyarakat_page', $masyarakatPage);

    // $kunjunganPage = $request->get('kunjungan_page', 1);
    // $kunjungan = KunjunganKesehatan::with('masyarakat')
    //     ->orderBy('tanggal_kunjungan', 'desc')
    //     ->paginate(10, ['*'], 'kunjungan_page', $kunjunganPage);

    // $kehamilanPage = $request->get('kehamilan_page', 1);
    // $kehamilan = Kehamilan::orderBy('usia_kehamilan', 'desc')
    //     ->paginate(10, ['*'], 'kehamilan_page', $kehamilanPage);

    // $imunisasiPage = $request->get('imunisasi_page', 1);
    // $imunisasi = Imunisasi::with('masyarakat')
    //     ->orderBy('tanggal_imunisasi', 'desc')
    //     ->paginate(10, ['*'], 'imunisasi_page', $imunisasiPage);

    $orangtua = Orangtua::orderBy('created_at','desc')->paginate(10, ['*'], 'orangtua_page');
        $anak = Anak::orderBy('created_at','desc')->paginate(10, ['*'], 'anak_page');
        $pelayanan = Pelayanan::orderBy('tanggal_pelayanan','desc')->paginate(10, ['*'], 'pelayanan_page');

    return view('data', compact('orangtua', 'anak', 'pelayanan'));
}




/* ======================== ORANG TUA ======================== */
    public function storeOrangtua(Request $request)
    {
        $request->validate([
            'nama_orangtua' => 'required|max:100',
            'nik' => 'required|max:20|unique:orang_tua,nik',

        ]);
        Orangtua::create($request->all());
        return back()->with('success', 'Data orang tua berhasil ditambahkan!');
    }

    public function updateOrangtua(Request $request, $id)
    {
        $orangtua = Orangtua::findOrFail($id);
        $orangtua->update($request->all());
        return back()->with('success', 'Data orang tua berhasil diperbarui!');
    }

    public function destroyOrangtua($id)
    {
        Orangtua::findOrFail($id)->delete();
        return back()->with('success', 'Data orang tua berhasil dihapus!');
    }

    /* ======================== ANAK ======================== */
    public function storeAnak(Request $request)
    {
        $request->validate([
            'nama_anak' => 'required|max:100',
        ]);
        Anak::create($request->all());
        return back()->with('success', 'Data anak berhasil ditambahkan!');
    }

    public function updateAnak(Request $request, $id)
    {
        Anak::findOrFail($id)->update($request->all());
        return back()->with('success', 'Data anak berhasil diperbarui!');
    }

    public function destroyAnak($id)
    {
        Anak::findOrFail($id)->delete();
        return back()->with('success', 'Data anak berhasil dihapus!');
    }

    /* ======================== PELAYANAN ======================== */
    public function storePelayanan(Request $request)
    {
        $request->validate([
            'tanggal_pelayanan' => 'required|date'
        ]);
        Pelayanan::create($request->all());
        return back()->with('success', 'Data pelayanan berhasil ditambahkan!');
    }

    public function updatePelayanan(Request $request, $id)
    {
        Pelayanan::findOrFail($id)->update($request->all());
        return back()->with('success', 'Data pelayanan berhasil diperbarui!');
    }

    public function destroyPelayanan($id)
    {
        Pelayanan::findOrFail($id)->delete();
        return back()->with('success', 'Data pelayanan berhasil dihapus!');
    }
}
