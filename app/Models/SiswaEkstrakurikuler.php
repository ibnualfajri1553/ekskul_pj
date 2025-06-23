<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class SiswaEkstrakurikuler extends Pivot
{
    protected $table = 'siswa_ekstrakurikuler';

    protected $fillable = ['siswa_id', 'id_eskul', 'status'];

    /**
     * Relasi ke model Siswa.
     */

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
    /**
     * Relasi ke model Ekstrakurikuler.
     */
    public function ekskul()
    {
        return $this->belongsTo(Ekstrakurikuler::class, 'id_eskul');
    }
}
