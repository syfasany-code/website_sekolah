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
        Schema::create('prestasi', function (Blueprint $table) {
            $table->id('id_prestasi');
            $table->string('judul');
            $table->string('nama_peraih');
            $table->string('kategori'); // Contoh: Akademik, Non-Akademik, Olahraga, Seni & Budaya
            $table->string('tingkat');  // Contoh: Kota/Kabupaten, Provinsi, Nasional, Internasional
            $table->string('juara');    // Contoh: Juara 1, Medali Emas
            $table->date('tanggal');
            $table->text('deskripsi')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasi');
    }
};
