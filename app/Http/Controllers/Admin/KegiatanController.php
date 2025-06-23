<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\Ekstrakurikuler;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::with('ekstrakurikuler')->orderBy('tanggal_mulai', 'desc')->get();
        return view('admin.kegiatan.index', compact('kegiatan'));
    }

    public function create()
    {
        $ekskul = Ekstrakurikuler::orderBy('nama_eskul')->get();
        return view('admin.kegiatan.create', compact('ekskul'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_eskul' => 'required|exists:ekstrakurikuler,id_eskul',
            'nama_kegiatan' => 'required|string|max:100',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'keterangan' => 'nullable|string'
        ]);

        Kegiatan::create($request->all());

        return redirect()->route('admin.kegiatan.index')->with('success', 'Data kegiatan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $ekskul = Ekstrakurikuler::orderBy('nama_eskul')->get();
        return view('admin.kegiatan.edit', compact('kegiatan', 'ekskul'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_eskul' => 'required|exists:ekstrakurikuler,id_eskul',
            'nama_kegiatan' => 'required|string|max:100',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'keterangan' => 'nullable|string'
        ]);

        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->update($request->all());

        return redirect()->route('admin.kegiatan.index')->with('success', 'Data kegiatan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->delete();

        return redirect()->route('admin.kegiatan.index')->with('success', 'Data kegiatan berhasil dihapus.');
    }
}
