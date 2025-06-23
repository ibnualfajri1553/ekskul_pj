<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    protected $primaryKey = 'id_keuangan';

    protected $fillable = ['id_eskul', 'id_anggaran', 'jenis_transaksi', 'tanggal_terima', 'jumlah_anggaran', 'keterangan'];

    public function ekstrakurikuler()
    {
        return $this->belongsTo(Ekstrakurikuler::class, 'id_eskul');
    }

    public function anggaran()
    {
        return $this->belongsTo(Anggaran::class, 'id_anggaran');
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'id_keuangan');
    }

    public function laporan()
    {
        return $this->hasMany(LaporanKeuangan::class, 'id_keuangan');
    }
}
