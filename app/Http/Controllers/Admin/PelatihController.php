<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelatih;
use Illuminate\Http\Request;

class PelatihController extends Controller
{
    public function index()
    {
        $pelatih = Pelatih::orderBy('nama_pelatih')->get();
        return view('admin.pelatih.index', compact('pelatih'));
    }

    public function create()
    {
        return view('admin.pelatih.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelatih' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'nomer_telpon' => 'required',
            'alamat' => 'required',
        ]);

        Pelatih::create($request->all());
        return redirect()->route('admin.pelatih.index')->with('success', 'Data pelatih berhasil ditambahkan.');
    }

    public function edit(Pelatih $pelatih)
    {
        return view('admin.pelatih.edit', compact('pelatih'));
    }

    public function update(Request $request, Pelatih $pelatih)
    {
        $request->validate([
            'nama_pelatih' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'nomer_telpon' => 'required',
            'alamat' => 'required',
        ]);

        $pelatih->update($request->all());
        return redirect()->route('admin.pelatih.index')->with('success', 'Data pelatih berhasil diperbarui.');
    }

    public function destroy(Pelatih $pelatih)
    {
        $pelatih->delete();
        return redirect()->route('admin.pelatih.index')->with('success', 'Pelatih berhasil dihapus.');
    }
}
