<?php

namespace App\Http\Controllers;

use App\Models\AbsensiSiswa;
use App\Models\MataPelajaran;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Pengajar;

class DashboardController extends Controller
{
   public function index(Request $request)
{
    
    // Statistik Jadwal Mapel per Hari
    $jadwalMapelPerHari = MataPelajaran::select('hari_les', DB::raw('count(*) as jumlah'))
        ->groupBy('hari_les')
        ->get();

    // Statistik Jenis Kelamin Siswa
    $jumlahSiswa = DB::table('siswa')
        ->select('jenis_kelamin', DB::raw('count(*) as total'))
        ->groupBy('jenis_kelamin')
        ->pluck('total', 'jenis_kelamin');

    // Statistik Jenis Kelamin Pengajar
    $jumlahPengajar = DB::table('pengajar')
        ->select('jenis_kelamin', DB::raw('count(*) as total'))
        ->groupBy('jenis_kelamin')
        ->pluck('total', 'jenis_kelamin');

    // Statistik Kehadiran Pengajar (On-Time vs Terlambat)
    $statistikKehadiranPengajar = DB::table('kehadiran')
    ->join('pengajar', 'kehadiran.departemen', '=', 'pengajar.identitas_pc')
    ->select(
        'pengajar.nama_pengajar as nama',
        DB::raw("
            SUM(
                CASE
                    WHEN DAYOFWEEK(tanggal) BETWEEN 2 AND 5
                        AND TIME_TO_SEC(jam_hadir) <= TIME_TO_SEC('15:40:00')
                    THEN 1
                    WHEN DAYOFWEEK(tanggal) = 6
                        AND TIME_TO_SEC(jam_hadir) <= TIME_TO_SEC('12:10:00')
                    THEN 1
                    WHEN DAYOFWEEK(tanggal) = 7
                        AND TIME_TO_SEC(jam_hadir) <= TIME_TO_SEC('09:10:00')
                    THEN 1
                    ELSE 0
                END
            ) AS on_time
        "),
        DB::raw("
            SUM(
                CASE
                    WHEN DAYOFWEEK(tanggal) BETWEEN 2 AND 5
                        AND TIME_TO_SEC(jam_hadir) > TIME_TO_SEC('15:40:00')
                    THEN 1
                    WHEN DAYOFWEEK(tanggal) = 6
                        AND TIME_TO_SEC(jam_hadir) > TIME_TO_SEC('12:10:00')
                    THEN 1
                    WHEN DAYOFWEEK(tanggal) = 7
                        AND TIME_TO_SEC(jam_hadir) > TIME_TO_SEC('09:10:00')
                    THEN 1
                    ELSE 0
                END
            ) AS terlambat
        ")
    )
    ->groupBy('pengajar.nama_pengajar')
    ->get();

        // Tambahan: Pencarian siswa & statistik kehadirannya
    $namaSiswa = $request->input('nama_siswa');
    $siswa = null;
    $statistikKehadiranSiswa = null;
    $persentaseKehadiran = null;

    if ($namaSiswa) {
        $siswa = Siswa::where('nama_siswa', 'like', '%' . $namaSiswa . '%')->first();

        if ($siswa) {
            $totalHadir = AbsensiSiswa::where('siswa_id', $siswa->id)->where('kehadiran_id', 1)->count(); // ID 1 = Hadir
            $totalPertemuan = AbsensiSiswa::where('siswa_id', $siswa->id)->count();

            $persentaseKehadiran = $totalPertemuan > 0 ? round(($totalHadir / $totalPertemuan) * 100, 2) : 0;

            $statistikKehadiranSiswa = AbsensiSiswa::select('kehadiran_id', DB::raw('count(*) as jumlah'))
                ->where('siswa_id', $siswa->id)
                ->groupBy('kehadiran_id')
                ->get();
        }
    }

return view('dashboard.index', [
    'jadwalMapelPerHari' => $jadwalMapelPerHari,
    'jumlahLaki' => $jumlahSiswa['L'] ?? 0,
    'jumlahPerempuan' => $jumlahSiswa['P'] ?? 0,
    'jumlahPengajarLaki' => $jumlahPengajar['L'] ?? 0,
    'jumlahPengajarPerempuan' => $jumlahPengajar['P'] ?? 0,
    'statistikKehadiranPengajar' => $statistikKehadiranPengajar,
    'siswa' => $siswa,
    'statistikKehadiranSiswa' => $statistikKehadiranSiswa,
    'persentaseKehadiran' => $persentaseKehadiran,
    'namaSiswa' => $namaSiswa
]);
}
}
