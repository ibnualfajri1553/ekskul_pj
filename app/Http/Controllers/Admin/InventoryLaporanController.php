<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventaris;
use Barryvdh\DomPDF\Facade\Pdf;

class InventoryLaporanController extends Controller
{
    /**
     * Tampilkan preview laporan inventory.
     */
    public function preview()
    {
        $inventaris = Inventaris::with('kegiatan')->orderBy('nama_barang')->get();
        return view('admin.inventory.laporan', compact('inventaris'));
    }

    /**
     * Download PDF laporan inventory.
     */
    public function download()
    {
        $inventaris = Inventaris::with('kegiatan')->orderBy('nama_barang')->get();

        $pdf = Pdf::loadView('admin.inventory.laporan_pdf', compact('inventaris'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('laporan-inventory.pdf');
    }
}
