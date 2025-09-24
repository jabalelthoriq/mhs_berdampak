<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kehamilan;
use App\Models\Masyarakat;

class KehamilanController
{
    public function store(Request $request)
    {
        $request->validate([
            'masyarakat_id'   => 'required|exists:masyarakat,masyarakat_id',
            'hpl'             => 'nullable|date',
            'usia_kehamilan'  => 'nullable|integer',
            'catatan'         => 'nullable|string',
        ]);

        Kehamilan::create($request->all());

        return redirect()
        ->route('data', ['kehamilan_page' => 1])
        ->with('success', 'Data kehamilan berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $kehamilan = Kehamilan::findOrFail($id);

        $request->validate([
            'masyarakat_id'   => 'required|exists:masyarakat,masyarakat_id',
            'hpl'             => 'nullable|date',
            'usia_kehamilan'  => 'nullable|integer',
            'catatan'         => 'nullable|string',
        ]);

        $kehamilan->update($request->all());

        return redirect()
        ->route('data', ['kehamilan_page' => $request->get('page', 1)]) // balik ke page terakhir
        ->with('success', 'Data kehamilan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kehamilan = Kehamilan::findOrFail($id);
        $kehamilan->delete();

         return redirect()
        ->route('data', ['kehamilan_page' => request()->get('page', 1)])
        ->with('success', 'Data kehamilan berhasil dihapus.');
    }
}
