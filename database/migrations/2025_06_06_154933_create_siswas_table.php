<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_siswa', 100);
            $table->date('tanggal_masuk_siswa');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('alamat_siswa', 100);
            $table->string('no_telepon_siswa', 15);
            $table->string('no_telepon_orang_tua', 15)->nullable();
            $table->foreignId('sekolah_id')
                  ->constrained('sekolah')
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
