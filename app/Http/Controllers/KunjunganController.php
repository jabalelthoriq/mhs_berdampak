<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KunjunganKesehatan;
use App\Models\Masyarakat;

class KunjunganController
{
    public function store(Request $request)
    {
        $request->validate([
            'masyarakat_id' => 'required|exists:masyarakat,masyarakat_id',
            'tanggal_kunjungan' => 'required|date',
            'keluhan' => 'required|string',
            'diagnosa' => 'nullable|string',
            'tindakan' => 'nullable|string',
        ]);

        KunjunganKesehatan::create($request->all());

        return redirect()->back()->with('kesehatan_success', 'Data kunjungan berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $kunjungan = KunjunganKesehatan::findOrFail($id);

        $request->validate([
            'masyarakat_id' => 'required|exists:masyarakat,masyarakat_id',
            'tanggal_kunjungan' => 'required|date',
            'keluhan' => 'required|string',
            'diagnosa' => 'nullable|string',
            'tindakan' => 'nullable|string',
        ]);

        $kunjungan->update($request->all());

        return redirect()->back()->with('kesehatan_success', 'Data kunjungan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kunjungan = KunjunganKesehatan::findOrFail($id);
        $kunjungan->delete();

        return redirect()->back()->with('kesehatan_success', 'Data kunjungan berhasil dihapus.');
    }
}
