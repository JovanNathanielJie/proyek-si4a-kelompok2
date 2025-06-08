<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = [
        'nama_siswa',
        'tanggal_masuk_siswa',
        'jenis_kelamin',
        'alamat_siswa',
        'no_telepon_siswa',
        'no_telepon_orang_tua',
        'sekolah_id',
    ];

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'sekolah_id');
    }
}
