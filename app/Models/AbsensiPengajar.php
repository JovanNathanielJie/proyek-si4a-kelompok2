<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbsensiPengajar extends Model
{
    protected $table = 'absensi_pengajar';

    protected $fillable = [
        'pengajar_id',
        'kehadiran_id',
    ];

    public function pengajar()
    {
        return $this->belongsTo(Pengajar::class, 'pengajar_id');
    }

    public function kehadiran()
    {
        return $this->belongsTo(Kehadiran::class, 'kehadiran_id');
    }
}
