<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ekstrakurikuler;
use Barryvdh\DomPDF\Facade\Pdf;

class EkstrakurikulerLaporanController extends Controller
{
    public function preview()
    {
        $ekskul = Ekstrakurikuler::with(['pembina', 'pelatih'])
            ->orderBy('nama_eskul')
            ->get();

        return view('admin.ekstrakurikuler.laporan', compact('ekskul'));
    }

    public function download()
    {
        $ekskul = Ekstrakurikuler::with(['pembina', 'pelatih'])
            ->orderBy('nama_eskul')
            ->get();

        $pdf = Pdf::loadView('admin.ekstrakurikuler.laporan_pdf', compact('ekskul'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('laporan-ekstrakurikuler.pdf');
    }
}
