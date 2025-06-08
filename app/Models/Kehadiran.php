<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    protected $table = 'kehadiran';

    protected $fillable = [
        'departemen',
        'tanggal',
        'jam_hadir',
    ];
}
