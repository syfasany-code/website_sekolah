<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Berita::create([
            'id_user' => 1,
            'judul' => 'Kegiatan Belajar Mengajar Semester Baru',
            'slug' => Str::slug('Belajar'),
            'isi' => 'Kegiatan belajar mengajar semester baru telah dimulai. Seluruh siswa mengikuti pembelajaran dengan semangat dan antusias bersama para guru.',
            'tanggal' => '2026-01-12',
            'gambar' => 'berita/belajar.jpg',
        ]);
    }
}
