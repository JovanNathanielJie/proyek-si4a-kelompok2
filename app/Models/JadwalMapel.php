<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalMapel extends Model
{
    protected $table = 'jadwal_mapel';

    protected $fillable = [
        'mata_pelajaran_id',
        'jadwal_les_id',
    ];

    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'mata_pelajaran_id', 'id');
    }
    public function jadwalLes()
    {
        return $this->belongsTo(JadwalLes::class, 'jadwal_les_id');
    }
}
