<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ekstrakurikuler;
use App\Models\SiswaEkstrakurikuler;
use Barryvdh\DomPDF\Facade\Pdf;


class SiswaEkstrakurikulerLaporanController extends Controller
{
    public function preview()
    {
        $data = SiswaEkstrakurikuler::with(['siswa', 'ekskul'])
            ->orderBy('siswa_id')
            ->get();

        return view('admin.siswa_ekskul.laporan', compact('data'));
    }

    /**
     * Download laporan siswa ekskul dalam bentuk PDF.
     */
    public function download()
    {
        $data = SiswaEkstrakurikuler::with(['siswa', 'ekskul'])
            ->orderBy('siswa_id')
            ->get();

        $pdf = Pdf::loadView('admin.siswa_ekskul.laporan_pdf', compact('data'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('laporan-siswa-ekskul.pdf');
    }
}
