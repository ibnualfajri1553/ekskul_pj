<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $primaryKey = 'id_pembayaran';

    protected $fillable = ['id_keuangan', 'tanggal_pembayaran', 'jumlah_pembayaran', 'metode_pembayaran'];

    public function keuangan()
    {
        return $this->belongsTo(Keuangan::class, 'id_keuangan');
    }
}
