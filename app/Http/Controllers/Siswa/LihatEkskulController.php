<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;

class LihatEkskulController extends Controller
{
    /**
     * Menampilkan daftar ekstrakurikuler yang tersedia.
     */
    public function index(Request $request)
    {
        $query = Ekstrakurikuler::with(['pembina', 'pelatih'])->orderBy('nama_eskul');

        if ($request->filled('search')) {
            $query->where('nama_eskul', 'like', '%' . $request->search . '%');
        }

        $ekskul = $query->get();

        return view('siswa.lihat_ekskul.index', compact('ekskul'));
    }
}
