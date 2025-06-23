<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Keuangan;
use App\Models\Ekstrakurikuler;
use App\Models\Anggaran;
use Illuminate\Http\Request;


class KeuanganController extends Controller
{
    public function index()
    {
        $keuangan = Keuangan::with('ekstrakurikuler', 'anggaran')->get();
        return view('admin.keuangan.index', compact('keuangan'));
    }

    public function create()
    {
        $ekskul = Ekstrakurikuler::all();
        $anggaran = Anggaran::all();
        return view('admin.keuangan.create', compact('ekskul', 'anggaran'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_eskul' => 'required',
            'id_anggaran' => 'required',
            'jenis_transaksi' => 'required',
            'tanggal_terima' => 'required|date',
            'keterangan' => 'nullable',
        ]);

        $anggaran = Anggaran::findOrFail($request->id_anggaran);

        Keuangan::create([
            'id_eskul' => $request->id_eskul,
            'id_anggaran' => $request->id_anggaran,
            'jenis_transaksi' => $request->jenis_transaksi,
            'tanggal_terima' => $request->tanggal_terima,
            'jumlah_anggaran' => $anggaran->anggaran_total, // pastikan nama field ini sesuai di model Anggaran
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('admin.keuangan.index')->with('success', 'Data keuangan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $keuangan = Keuangan::findOrFail($id);
        $ekskul = Ekstrakurikuler::all();
        $anggaran = Anggaran::all();
        return view('admin.keuangan.edit', compact('keuangan', 'ekskul', 'anggaran'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_eskul' => 'required',
            'id_anggaran' => 'required',
            'jenis_transaksi' => 'required',
            'tanggal_terima' => 'required|date',
            'jumlah_anggaran' => 'required|numeric',
            'keterangan' => 'nullable',
        ]);

        $keuangan = Keuangan::findOrFail($id);
        $keuangan->update($request->all());

        return redirect()->route('admin.keuangan.index')->with('success', 'Data keuangan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Keuangan::destroy($id);
        return redirect()->route('admin.keuangan.index')->with('success', 'Data keuangan berhasil dihapus.');
    }

    public function show($id)
    {
        $keuangan = Keuangan::with('ekstrakurikuler', 'anggaran')->findOrFail($id);
        return view('admin.keuangan.show', compact('keuangan'));
    }
}
