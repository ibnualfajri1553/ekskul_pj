<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembina;
use Illuminate\Http\Request;
use App\Models\Siswa;
use Barryvdh\DomPDF\Facade\Pdf;

class PembinaLaporanController extends Controller
{
    public function preview()
    {
        $pembina = Pembina::orderBy('nama_pembina')->get();
        return view('admin.pembina.laporan', compact('pembina'));
    }

    public function download()
    {
        $pembina = Pembina::orderBy('nama_pembina')->get();

        $pdf = Pdf::loadView('admin.pembina.laporan_pdf', compact('pembina'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('laporan-pembina.pdf');
    }
}
