<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalSiswa extends Model
{
    protected $table = 'jadwal_siswa';

    protected $fillable = [
        'siswa_id',
        'jadwal_les_id',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function jadwalLes()
    {
        return $this->belongsTo(JadwalLes::class, 'jadwal_les_id');
    }
}
