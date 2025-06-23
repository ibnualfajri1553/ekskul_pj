<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::orderBy('nama_siswa')->get();
        return view('admin.siswa.index', compact('siswa'));
    }

    public function create()
    {
        return view('admin.siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis_siswa' => 'required|unique:siswa,nis_siswa',
            'nama_siswa' => 'required|string|max:100',
            'kelas' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'nomer_telpon' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
        ]);

        Siswa::create($request->all());

        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    public function show(Siswa $siswa)
    {
        return view('admin.siswa.show', compact('siswa'));
    }

    public function edit(Siswa $siswa)
    {
        return view('admin.siswa.edit', compact('siswa'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nama_siswa' => 'required|string|max:100',
            'kelas' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'nomer_telpon' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
        ]);

        $siswa->update($request->all());

        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa diperbarui.');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()->route('admin.siswa.index')->with('success', 'Siswa dihapus.');
    }
}
