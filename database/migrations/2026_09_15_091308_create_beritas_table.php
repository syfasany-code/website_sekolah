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
        Schema::create('berita', function (Blueprint $table) {
            $table->id('id_berita'); // ✅ cukup 1 ini aja

            $table->string('judul', 50);
            $table->text('isi');
            $table->date('tanggal');
            $table->enum('status', ['draf', 'publis']);
            $table->string('gambar', 100)->nullable();

            $table->foreignId('id_user')
                ->constrained('users', 'id_user')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};
