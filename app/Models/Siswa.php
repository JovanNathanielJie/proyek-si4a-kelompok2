<?php

namespace App\Models;

use Carbon\Carbon;
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
        'bulan_tahun_ajaran',
        'sekolah_id',
    ];

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'sekolah_id');
    }


    public function getKelasAttribute()
    {
        // Format input: "2023-07"
        if (!$this->bulan_tahun_ajaran) {
            return 'Kelas ?'; // fallback
        }

        try {
            $masuk = Carbon::createFromFormat('Y-m', $this->bulan_tahun_ajaran);
            $sekarang = Carbon::now();

            // Hitung selisih tahun
            $selisih = $sekarang->year - $masuk->year;

            // Jika bulan sekarang < bulan masuk, berarti belum genap setahun
            if ($sekarang->month < $masuk->month) {
                $selisih--;
            }

            // Hitung kelas dari 10 ke atas, batasi antara 10 sampai 12
            $kelas = max(10, min(10 + $selisih, 12));
            return 'Kelas ' . $kelas;
        } catch (\Exception $e) {
            return 'Kelas ?';
        }
    }


}
