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
        Schema::table('jadwal_les', function (Blueprint $table) {
            $table->dropColumn(['hari_les', 'jam_mulai', 'jam_selesai', 'mata_pelajaran']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jadwal_les', function (Blueprint $table) {
            //
        });
    }
};
