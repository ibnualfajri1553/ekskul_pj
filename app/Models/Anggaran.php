<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggaran extends Model
{
    protected $table = 'anggaran';
    protected $primaryKey = 'id_anggaran';

    protected $fillable = ['id_kegiatan', 'anggaran_total', 'tahun_anggaran', 'keterangan'];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'id_kegiatan');
    }

    public function keuangan()
    {
        return $this->hasMany(Keuangan::class, 'id_anggaran');
    }
}
