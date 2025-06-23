<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Anggaran;
use App\Models\Kegiatan;

class AnggaranController extends Controller
{
    public function index()
    {
        $anggaran = Anggaran::with('kegiatan')->orderBy('tahun_anggaran', 'desc')->get();
        return view('admin.anggaran.index', compact('anggaran'));
    }

    public function create()
    {
        $kegiatan = Kegiatan::orderBy('nama_kegiatan')->get();
        return view('admin.anggaran.create', compact('kegiatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kegiatan' => 'required|exists:kegiatan,id_kegiatan',
            'anggaran_total' => 'required|numeric|min:0',
            'tahun_anggaran' => 'required|digits:4',
            'keterangan' => 'nullable|string|max:255',
        ]);

        Anggaran::create($request->all());

        return redirect()->route('admin.anggaran.index')
            ->with('success', 'Data anggaran berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $anggaran = Anggaran::findOrFail($id);
        $kegiatan = Kegiatan::orderBy('nama_kegiatan')->get();

        return view('admin.anggaran.edit', compact('anggaran', 'kegiatan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_kegiatan' => 'required|exists:kegiatan,id_kegiatan',
            'anggaran_total' => 'required|numeric|min:0',
            'tahun_anggaran' => 'required|digits:4',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $anggaran = Anggaran::findOrFail($id);
        $anggaran->update($request->all());

        return redirect()->route('admin.anggaran.index')
            ->with('success', 'Data anggaran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $anggaran = Anggaran::findOrFail($id);
        $anggaran->delete();

        return redirect()->route('admin.anggaran.index')
            ->with('success', 'Data anggaran berhasil dihapus.');
    }
}
