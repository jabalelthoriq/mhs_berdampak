<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imunisasi;
use App\Models\Masyarakat;

class ImunisasiController
{
    public function store(Request $request)
    {
        $request->validate([
            'masyarakat_id'    => 'required|exists:masyarakat,masyarakat_id',
            'jenis_imunisasi'  => 'required|string|max:100',
            'tanggal_imunisasi'=> 'required|date',
        ]);

        Imunisasi::create($request->all());

        return redirect()->back()->with('imunisasi_success', 'Data imunisasi berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $imunisasi = Imunisasi::findOrFail($id);

        $request->validate([
            'masyarakat_id'    => 'required|exists:masyarakat,masyarakat_id',
            'jenis_imunisasi'  => 'required|string|max:100',
            'tanggal_imunisasi'=> 'required|date',
        ]);

        $imunisasi->update($request->all());

        return redirect()->back()->with('imunisasi_success', 'Data imunisasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $imunisasi = Imunisasi::findOrFail($id);
        $imunisasi->delete();

        return redirect()->back()->with('imunisasi_success', 'Data imunisasi berhasil dihapus.');
    }
}
