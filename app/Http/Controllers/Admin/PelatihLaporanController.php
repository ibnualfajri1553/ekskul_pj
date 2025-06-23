<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelatih;
use App\Models\Pembina;
use Illuminate\Http\Request;
use App\Models\Siswa;
use Barryvdh\DomPDF\Facade\Pdf;

class PelatihLaporanController extends Controller
{
    public function preview()
    {
        $pelatih = Pelatih::orderBy('nama_pelatih')->get();
        return view('admin.pelatih.laporan', compact('pelatih'));
    }

    public function download()
    {
        $pelatih = Pelatih::orderBy('nama_pelatih')->get();

        $pdf = Pdf::loadView('admin.pelatih.laporan_pdf', compact('pelatih'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('laporan-pelatih.pdf');
    }
}
