<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengajar extends Model
{
    protected $table = 'pengajar';

    protected $fillable = [
        'nama_pengajar',
        'tanggal_masuk_pengajar',
        'jenis_kelamin',
        'alamat_pengajar',
        'no_telepon_pengajar',
        'identitas_pc'
    ];

}
