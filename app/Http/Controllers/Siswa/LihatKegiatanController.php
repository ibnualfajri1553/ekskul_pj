<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class LihatKegiatanController extends Controller
{
    /**
     * Menampilkan daftar kegiatan ekstrakurikuler untuk siswa.
     */
    public function index(Request $request)
    {
        $query = Kegiatan::with('ekstrakurikuler')->orderByDesc('tanggal_mulai');

        if ($request->filled('search')) {
            $query->where('nama_kegiatan', 'like', '%' . $request->search . '%');
        }

        $kegiatan = $query->get();

        return view('siswa.lihat_kegiatan.index', compact('kegiatan'));
    }
}
