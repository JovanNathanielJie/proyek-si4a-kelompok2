<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'ruangan';

    protected $fillable = [
        'kode_ruangan',
        'lantai_ruangan',
        'jumlah_kursi',
    ];

}
