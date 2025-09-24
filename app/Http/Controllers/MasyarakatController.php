<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masyarakat;

class MasyarakatController
{
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|max:16|unique:masyarakat,nik',
            'nama' => 'required|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:15',
            'pekerjaan' => 'nullable|string|max:100',
        ]);

        Masyarakat::create($request->all());

        return redirect()
        ->route('data', ['masyarakat_page' => 1])
        ->with('success', 'Data masyarakat berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $masyarakat = Masyarakat::findOrFail($id);

        $request->validate([
            'nik' => 'required|string|max:16|unique:masyarakat,nik,' . $masyarakat->masyarakat_id . ',masyarakat_id',
            'nama' => 'required|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:15',
            'pekerjaan' => 'nullable|string|max:100',
        ]);

        $masyarakat->update($request->all());

        return redirect()
        ->route('data', ['masyarakat_page' => $request->get('page', 1)]) // balik ke page terakhir
        ->with('success', 'Data masyarakat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $masyarakat = Masyarakat::findOrFail($id);
        $masyarakat->delete();

         return redirect()
        ->route('data', ['masyarakat_page' => request()->get('page', 1)])
        ->with('success', 'Data masyarakat berhasil dihapus.');
    }
}
