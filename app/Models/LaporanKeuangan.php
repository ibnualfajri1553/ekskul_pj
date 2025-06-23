<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanKeuangan extends Model
{
    protected $primaryKey = 'id_laporan';

    protected $fillable = ['tanggal_laporan', 'total_pemasukan', 'total_pengeluaran', 'saldo_akhir', 'id_keuangan'];

    public function keuangan()
    {
        return $this->belongsTo(Keuangan::class, 'id_keuangan');
    }
}
