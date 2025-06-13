<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    protected $table = 'sekolah';

    protected $fillable = [
        'nama_sekolah',
        'alamat_sekolah',
    ];

    public function jadwalSekolah()
    {
        return $this->hasMany(JadwalSekolah::class, 'id_sekolah', 'id');
    }
}
