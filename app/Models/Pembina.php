<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembina extends Model

{
    protected $table = 'pembina'; // ⬅️ tambahkan ini

    protected $fillable = ['nip_pembina', 'nama_pembina', 'jenis_kelamin', 'nomer_telpon', 'alamat'];

    public function ekstrakurikuler()
    {
        return $this->hasMany(Ekstrakurikuler::class, 'id_pembina');
    }
}
