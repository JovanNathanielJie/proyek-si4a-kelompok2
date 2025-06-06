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
        Schema::create('jadwal_les', function (Blueprint $table) {
            $table->id();
            $table->string('hari_les', 20);
            $table->date('tanggal_les');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('keterangan', 100);
            $table->string('mata_pelajaran', 50);
            $table->foreignId('ruangan_id')
                  ->constrained('ruangan')
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_les');
    }
};
