<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelatih extends Model
{
    protected $table = 'pelatih'; // ⬅️ tambahkan ini

    protected $fillable = ['nama_pelatih', 'jenis_kelamin', 'nomer_telpon', 'alamat'];

    public function ekstrakurikuler()
    {
        return $this->hasMany(Ekstrakurikuler::class, 'id_pelatih');
    }
}
