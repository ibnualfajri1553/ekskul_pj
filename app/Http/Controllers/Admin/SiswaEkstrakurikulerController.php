<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Ekstrakurikuler;
use App\Models\SiswaEkstrakurikuler;
use Illuminate\Http\Request;

class SiswaEkstrakurikulerController extends Controller
{
    public function index()
    {
        $data = SiswaEkstrakurikuler::with(['siswa', 'ekskul'])->latest()->get();
        return view('admin.siswa_ekskul.index', compact('data'));
    }

    public function create()
    {
        $siswa = Siswa::orderBy('nama_siswa')->get();
        $ekskul = Ekstrakurikuler::orderBy('nama_eskul')->get();
        return view('admin.siswa_ekskul.create', compact('siswa', 'ekskul'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'id_eskul' => 'required|exists:ekstrakurikuler,id_eskul',
            'status' => 'nullable|string|max:100'
        ]);

        SiswaEkstrakurikuler::create([
            'siswa_id' => $request->siswa_id,
            'id_eskul' => $request->id_eskul,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.siswa_ekskul.index')->with('success', 'Pendaftaran berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $entry = SiswaEkstrakurikuler::findOrFail($id);
        $siswa = Siswa::orderBy('nama_siswa')->get();
        $ekskul = Ekstrakurikuler::orderBy('nama_eskul')->get();
        return view('admin.siswa_ekskul.edit', compact('entry', 'siswa', 'ekskul'));
    }

    public function update(Request $request, $id)
    {
        $entry = SiswaEkstrakurikuler::findOrFail($id);

        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'id_eskul' => 'required|exists:ekstrakurikuler,id_eskul',
            'status' => 'nullable|string|max:100'
        ]);

        $entry->update([
            'siswa_id' => $request->siswa_id,
            'id_eskul' => $request->id_eskul,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.siswa_ekskul.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $entry = SiswaEkstrakurikuler::findOrFail($id);
        $entry->delete();

        return redirect()->route('admin.siswa_ekskul.index')->with('success', 'Data berhasil dihapus!');
    }
}
