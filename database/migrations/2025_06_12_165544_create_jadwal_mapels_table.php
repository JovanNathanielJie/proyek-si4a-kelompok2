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
        Schema::create('jadwal_mapel', function (Blueprint $table) {
            $table->id();
            $table->foreignId(('mata_pelajaran_id'))
                  ->constrained('mata_pelajaran')
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('jadwal_les_id')
                  ->constrained('jadwal_les')
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_mapel');
    }
};
