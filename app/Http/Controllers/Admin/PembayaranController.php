<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use App\Models\Keuangan;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::with('keuangan.ekstrakurikuler', 'keuangan.anggaran.kegiatan')->get();
        return view('admin.pembayaran.index', compact('pembayaran'));
    }

    public function create()
    {
        $keuangan = Keuangan::with('ekstrakurikuler', 'anggaran.kegiatan')->get();
        return view('admin.pembayaran.create', compact('keuangan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_keuangan' => 'required|exists:keuangan,id_keuangan',
            'tanggal_pembayaran' => 'required|date',
            'jumlah_pembayaran' => 'required|numeric|min:1',
            'metode_pembayaran' => 'required|string|max:100',
        ]);

        $keuangan = Keuangan::findOrFail($request->id_keuangan);

        if ($request->jumlah_pembayaran > $keuangan->jumlah_anggaran) {
            return back()->withErrors(['jumlah_pembayaran' => 'Jumlah pembayaran melebihi saldo keuangan.']);
        }

        Pembayaran::create($request->all());

        // Kurangi saldo
        $keuangan->decrement('jumlah_anggaran', $request->jumlah_pembayaran);

        return redirect()->route('admin.pembayaran.index')->with('success', 'Pembayaran berhasil ditambahkan dan saldo diperbarui.');
    }

    public function edit($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $keuangan = Keuangan::with('ekstrakurikuler', 'anggaran.kegiatan')->get();
        return view('admin.pembayaran.edit', compact('pembayaran', 'keuangan'));
    }

    public function update(Request $request, $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $keuanganLama = $pembayaran->keuangan;

        $request->validate([
            'id_keuangan' => 'required|exists:keuangan,id_keuangan',
            'tanggal_pembayaran' => 'required|date',
            'jumlah_pembayaran' => 'required|numeric|min:1',
            'metode_pembayaran' => 'required|string|max:100',
        ]);

        // Kembalikan saldo keuangan lama
        $keuanganLama->increment('jumlah_anggaran', $pembayaran->jumlah_pembayaran);

        $keuanganBaru = Keuangan::findOrFail($request->id_keuangan);

        if ($request->jumlah_pembayaran > $keuanganBaru->jumlah_anggaran) {
            return back()->withErrors(['jumlah_pembayaran' => 'Jumlah pembayaran melebihi saldo tersedia.']);
        }

        $pembayaran->update($request->all());

        // Kurangi saldo baru
        $keuanganBaru->decrement('jumlah_anggaran', $request->jumlah_pembayaran);

        return redirect()->route('admin.pembayaran.index')->with('success', 'Data pembayaran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $keuangan = $pembayaran->keuangan;

        // Kembalikan saldo
        $keuangan->increment('jumlah_anggaran', $pembayaran->jumlah_pembayaran);

        $pembayaran->delete();

        return redirect()->route('admin.pembayaran.index')->with('success', 'Pembayaran berhasil dihapus dan saldo dikembalikan.');
    }
}
