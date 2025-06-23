<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ekstrakurikuler;
use App\Models\Pembina;
use App\Models\Pelatih;
use Illuminate\Http\Request;

class EkstrakurikulerController extends Controller
{
    public function index()
    {
        $ekskul = Ekstrakurikuler::with(['pembina', 'pelatih'])->orderBy('nama_eskul')->get();
        return view('admin.ekstrakurikuler.index', compact('ekskul'));
    }

    public function create()
    {
        $pembina = Pembina::orderBy('nama_pembina')->get();
        $pelatih = Pelatih::orderBy('nama_pelatih')->get();
        return view('admin.ekstrakurikuler.create', compact('pembina', 'pelatih'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_eskul' => 'required|string|max:100',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'id_pembina' => 'nullable|exists:pembina,id',
            'id_pelatih' => 'nullable|exists:pelatih,id',
            'keterangan' => 'nullable|string',
        ]);

        Ekstrakurikuler::create($request->all());

        return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil ditambahkan.');
    }

    public function edit(Ekstrakurikuler $ekstrakurikuler)
    {
        $pembina = Pembina::orderBy('nama_pembina')->get();
        $pelatih = Pelatih::orderBy('nama_pelatih')->get();
        return view('admin.ekstrakurikuler.edit', compact('ekstrakurikuler', 'pembina', 'pelatih'));
    }

    public function update(Request $request, Ekstrakurikuler $ekstrakurikuler)
    {
        $request->validate([
            'nama_eskul' => 'required|string|max:100',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'id_pembina' => 'nullable|exists:pembina,id',
            'id_pelatih' => 'nullable|exists:pelatih,id',
            'keterangan' => 'nullable|string',
        ]);

        $ekstrakurikuler->update($request->all());

        return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil diperbarui.');
    }

    public function destroy(Ekstrakurikuler $ekstrakurikuler)
    {
        $ekstrakurikuler->delete();
        return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil dihapus.');
    }
}
