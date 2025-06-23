<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = 'kegiatan';
    protected $primaryKey = 'id_kegiatan';

    protected $fillable = ['id_eskul', 'nama_kegiatan', 'tanggal_mulai', 'tanggal_selesai', 'keterangan'];

    public function ekstrakurikuler()
    {
        return $this->belongsTo(Ekstrakurikuler::class, 'id_eskul');
    }

    public function inventaris()
    {
        return $this->hasMany(Inventaris::class, 'id_kegiatan');
    }

    public function anggaran()
    {
        return $this->hasOne(Anggaran::class, 'id_kegiatan');
    }
}
