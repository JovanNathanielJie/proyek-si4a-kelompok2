<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AbsensiPengajarController;
use App\Http\Controllers\AbsensiSiswaController;
use App\Http\Controllers\JadwalPengajarController;
use App\Http\Controllers\JadwalSiswaController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\PengajarController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\JadwalLesController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\JadwalSekolahController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\JadwalMapelController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('pengajar', PengajarController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('sekolah', SekolahController::class);
    Route::resource('jadwal_les', JadwalLesController::class);
    Route::resource('jadwal_sekolah', JadwalSekolahController::class);
    Route::resource('jadwal_pengajar', JadwalPengajarController::class);
    Route::resource('jadwal_siswa', JadwalSiswaController::class);
    Route::resource('absensi_siswa', AbsensiSiswaController::class);
    Route::resource('absensi_pengajar', AbsensiPengajarController::class);
    Route::resource('kehadiran', KehadiranController::class);
    Route::resource('ruangan', RuanganController::class);
    Route::resource('mata_pelajaran', MataPelajaranController::class);
    Route::resource('jadwal_mapel', JadwalMapelController::class);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

});

require __DIR__.'/auth.php';
