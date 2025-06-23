<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{

    protected $table = 'ekstrakurikuler';
    protected $primaryKey = 'id_eskul';

    protected $fillable = [
        'nama_eskul',
        'visi',
        'misi',
        'id_pembina',
        'id_pelatih',
        'keterangan'
    ];

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class, 'siswa_ekstrakurikuler')
            ->withPivot('status')
            ->withTimestamps();
    }

    public function pembina()
    {
        return $this->belongsTo(Pembina::class, 'id_pembina');
    }

    public function pelatih()
    {
        return $this->belongsTo(Pelatih::class, 'id_pelatih');
    }

    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class, 'id_eskul');
    }

    public function keuangan()
    {
        return $this->hasMany(Keuangan::class, 'id_eskul');
    }
}
