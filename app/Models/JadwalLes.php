<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalLes extends Model
{
    protected $table = 'jadwal_les';

    protected $fillable = [
        'hari_les',
        'tanggal_les',
        'jam_mulai',
        'jam_selesai',
        'keterangan',
        'mata_pelajaran',
        'ruangan_id',
    ];

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_id');
    }
}
