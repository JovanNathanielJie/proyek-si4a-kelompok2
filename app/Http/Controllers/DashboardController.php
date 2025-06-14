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

        // Statistik Jumlah Kursi
        $jumlahKursiPerRuangan = DB::table('ruangan')
        ->select('kode_ruangan', 'jumlah_kursi')
        ->get();

        // Statistik Jumlah Siswa Per Kelas
        $jumlahSiswaPerKelas = \App\Models\Siswa::all()
        ->groupBy('kelas')
        ->map(function ($group) {
            return count($group);
        });

        // Statistik Jumlah Siswa Per Sekolah
        $jumlahSiswaPerSekolah = DB::table('siswa')
        ->join('sekolah', 'siswa.sekolah_id', '=', 'sekolah.id')
        ->select('sekolah.nama_sekolah', DB::raw('count(*) as total'))
        ->groupBy('sekolah.nama_sekolah')
        ->get();
// Pencarian Kehadiran Siswa
$namaSiswa = $request->query('nama_siswa');
    $siswa = null;
    $jumlahHadir = 0;

    if ($namaSiswa) {
       $siswa = Siswa::whereRaw('LOWER(nama_siswa) = ?', [strtolower($request->nama_siswa)])->first();

        if ($siswa) {
            $jumlahHadir = \App\Models\AbsensiSiswa::where('siswa_id', $siswa->id)->count();
        }
    }

return view('dashboard.index', [
    'jadwalMapelPerHari' => $jadwalMapelPerHari,
    'jumlahLaki' => $jumlahSiswa['L'] ?? 0,
    'jumlahPerempuan' => $jumlahSiswa['P'] ?? 0,
    'jumlahPengajarLaki' => $jumlahPengajar['L'] ?? 0,
    'jumlahPengajarPerempuan' => $jumlahPengajar['P'] ?? 0,
    'jumlahKursiPerRuangan' => $jumlahKursiPerRuangan,
    'jumlahSiswaPerKelas' => $jumlahSiswaPerKelas,
    'jumlahSiswaPerSekolah' => $jumlahSiswaPerSekolah,
    'siswa' => $siswa,
    'jumlahHadir' => $jumlahHadir,
    'namaSiswa' => $namaSiswa
]);
}
}
