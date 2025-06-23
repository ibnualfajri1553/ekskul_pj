<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $fillable = [
        'nis_siswa',
        'nama_siswa',
        'kelas',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat',
        'nomer_telpon'
    ];

    public function ekstrakurikuler()
    {
        return $this->belongsToMany(Ekstrakurikuler::class, 'siswa_ekstrakurikuler')
            ->withPivot('status')
            ->withTimestamps();
    }
}
