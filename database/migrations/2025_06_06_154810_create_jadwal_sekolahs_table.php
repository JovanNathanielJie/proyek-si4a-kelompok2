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
        Schema::create('jadwal_sekolah', function (Blueprint $table) {
            $table->id();
            $table->string('hari_sekolah', 20);
            $table->time('jam_mulai');
            $table->time('jam_selesai');
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
        Schema::dropIfExists('jadwal_sekolah');
    }
};
