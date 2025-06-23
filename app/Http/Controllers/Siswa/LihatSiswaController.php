<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;

class LihatSiswaController extends Controller
{
    /**
     * Tampilkan daftar siswa (hanya lihat saja untuk role siswa).
     */
    public function index(Request $request)
    {
        $query = Siswa::orderBy('nama_siswa');

        if ($request->filled('search')) {
            $query->where('nama_siswa', 'like', '%' . $request->search . '%');
        }

        $siswa = $query->get();
        return view('siswa.lihat_siswa.index', compact('siswa'));
    }
}
