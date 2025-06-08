<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalPengajar extends Model
{
    protected $table = 'jadwal_pengajar';

    protected $fillable = [
        'pengajar_id',
        'jadwal_les_id',
    ];

    public function pengajar()
    {
        return $this->belongsTo(Pengajar::class, 'pengajar_id');
    }
    public function jadwalLes()
    {
        return $this->belongsTo(JadwalLes::class, 'jadwal_les_id');
    }
}
