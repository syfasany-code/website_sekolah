<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Seeder;

class GaleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Galeri::create([
            'judul' => 'Kegiatan Upacara Bendera',
            'keterangan' => 'Kegiatan upacara bendera yang dilaksanakan di lingkungan sekolah.',
            'file' => 'galeri/upacara.jpg',
            'tanggal' => '2026-01-06',
        ]);
    }
}
