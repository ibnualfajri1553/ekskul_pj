<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventaris;
use App\Models\Kegiatan;

class InventoryController extends Controller
{
    public function index()
    {
        $inventaris = Inventaris::with('kegiatan')->orderBy('nama_barang')->get();
        return view('admin.inventory.index', compact('inventaris'));
    }

    public function create()
    {
        $kegiatan = Kegiatan::all();
        return view('admin.inventory.create', compact('kegiatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kegiatan' => 'required|exists:kegiatan,id_kegiatan',
            'nama_barang' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'kondisi' => 'required|string|max:100',
        ]);

        Inventaris::create($request->all());

        return redirect()->route('admin.inventory.index')->with('success', 'Data inventory berhasil ditambahkan.');
    }

    public function edit($id_inventaris)
    {
        $inventaris = Inventaris::findOrFail($id_inventaris);
        $kegiatan = Kegiatan::all();
        return view('admin.inventory.edit', compact('inventaris', 'kegiatan'));
    }

    public function update(Request $request, $id_inventaris)
    {
        $request->validate([
            'id_kegiatan' => 'required|exists:kegiatan,id_kegiatan',
            'nama_barang' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'kondisi' => 'required|string|max:100',
        ]);

        $inventaris = Inventaris::findOrFail($id_inventaris);
        $inventaris->update($request->all());

        return redirect()->route('admin.inventory.index')->with('success', 'Data inventory berhasil diperbarui.');
    }

    public function destroy($id_inventaris)
    {
        $inventaris = Inventaris::findOrFail($id_inventaris);
        $inventaris->delete();

        return redirect()->route('admin.inventory.index')->with('success', 'Data inventory berhasil dihapus.');
    }
}
