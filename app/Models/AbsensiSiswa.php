<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbsensiSiswa extends Model
{
    protected $table = 'absensi_siswa';

    protected $fillable = [
        'siswa_id',
        'kehadiran_id',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function kehadiran()
    {
        return $this->belongsTo(Kehadiran::class, 'kehadiran_id');
    }
}
