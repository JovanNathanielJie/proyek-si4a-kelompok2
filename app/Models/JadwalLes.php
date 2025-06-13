<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalLes extends Model
{
    protected $table = 'jadwal_les';

    protected $fillable = [
        'tanggal_les',
        'keterangan',
        'ruangan_id',
    ];

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_id');
    }

    public function jadwalMapel()
    {
        return $this->hasMany(JadwalMapel::class, 'jadwal_les_id');
    }
}
