<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('penilaian_sister', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dosen_id')->constrained('dosen')->cascadeOnDelete(); // Dosen yang dinilai
            $table->foreignId('periode_id')->constrained('periode')->cascadeOnDelete(); // Dosen berjabatan yang menilai
            $table->tinyInteger('bidang_pendidikan')->unsigned();
            $table->tinyInteger('bidang_penelitian')->unsigned();
            $table->tinyInteger('bidang_pengabdian')->unsigned();
            $table->tinyInteger('bidang_penunjang')->unsigned();
            $table->decimal('total_nilai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaiansister');
    }
};
