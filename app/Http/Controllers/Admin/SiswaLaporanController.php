<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use Barryvdh\DomPDF\Facade\Pdf;

class SiswaLaporanController extends Controller
{
    public function preview()
    {
        $siswa = Siswa::orderBy('nama_siswa')->get();
        return view('admin.siswa.laporan', compact('siswa'));
    }

    public function download()
    {
        $siswa = Siswa::orderBy('nama_siswa')->get();

        $pdf = Pdf::loadView('admin.siswa.laporan_pdf', compact('siswa'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('laporan-siswa.pdf');
    }
}
