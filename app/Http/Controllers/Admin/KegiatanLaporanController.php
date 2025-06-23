<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class KegiatanLaporanController extends Controller
{
    /**
     * Tampilkan halaman pratinjau laporan kegiatan.
     */
    public function preview()
    {
        $kegiatan = Kegiatan::with('ekstrakurikuler')->orderBy('tanggal_mulai', 'desc')->get();
        return view('admin.kegiatan.laporan', compact('kegiatan'));
    }

    /**
     * Unduh laporan kegiatan sebagai PDF.
     */
    public function download()
    {
        $kegiatan = Kegiatan::with('ekstrakurikuler')->orderBy('tanggal_mulai', 'desc')->get();

        $pdf = Pdf::loadView('admin.kegiatan.laporan_pdf', compact('kegiatan'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('laporan-kegiatan.pdf');
    }
}
