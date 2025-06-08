<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalSekolah extends Model
{
    protected $table = 'jadwal_sekolah';

    protected $fillable = [
        'hari_sekolah',
        'jam_mulai',
        'jam_selesai',
        'sekolah_id',
    ];

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'sekolah_id');
    }
}
