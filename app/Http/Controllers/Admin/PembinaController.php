<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembina;
use Illuminate\Http\Request;

class PembinaController extends Controller
{
    public function index()
    {
        $pembina = Pembina::orderBy('nama_pembina')->get();
        return view('admin.pembina.index', compact('pembina'));
    }

    public function create()
    {
        return view('admin.pembina.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip_pembina' => 'required|unique:pembina',
            'nama_pembina' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'nomer_telpon' => 'required',
            'alamat' => 'required',
        ]);

        Pembina::create($request->all());
        return redirect()->route('admin.pembina.index')->with('success', 'Data pembina berhasil ditambahkan.');
    }

    public function show(Pembina $pembina)
    {
        return view('admin.pembina.show', compact('pembina'));
    }

    public function edit(Pembina $pembina)
    {
        return view('admin.pembina.edit', compact('pembina'));
    }

    public function update(Request $request, Pembina $pembina)
    {
        $request->validate([
            'nip_pembina' => 'required|unique:pembina,nip_pembina,' . $pembina->id,
            'nama_pembina' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'nomer_telpon' => 'required',
            'alamat' => 'required',
        ]);

        $pembina->update($request->all());
        return redirect()->route('admin.pembina.index')->with('success', 'Data pembina berhasil diperbarui.');
    }

    public function destroy(Pembina $pembina)
    {
        $pembina->delete();
        return redirect()->route('admin.pembina.index')->with('success', 'Pembina berhasil dihapus.');
    }
}
