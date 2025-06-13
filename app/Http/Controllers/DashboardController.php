<?php

namespace App\Http\Controllers;

use App\Models\AbsensiPengajar;
use App\Models\AbsensiSiswa;
use App\Models\Kehadiran;
use App\Models\MataPelajaran;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Pengajar;
use Carbon\Carbon;

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

    'siswa' => $siswa,
    'statistikKehadiranSiswa' => $statistikKehadiranSiswa,
    'persentaseKehadiran' => $persentaseKehadiran,
    'namaSiswa' => $namaSiswa
]);
}
}
