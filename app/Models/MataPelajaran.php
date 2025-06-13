<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    protected $table = 'mata_pelajaran';

    protected $fillable = [
        'kode_mapel',
        'nama_mapel',
        'hari_les',
        'waktu_mulai',
        'waktu_selesai'
    ];
    

}
