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
        Schema::create('pengajar', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengajar', 100);
            $table->date('tanggal_masuk_pengajar');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('alamat_pengajar', 100);
            $table->string('no_telepon_pengajar', 15);
            $table->string('identitas_pc', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajar');
    }
};
