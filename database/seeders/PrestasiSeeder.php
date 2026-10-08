<?php

namespace Database\Seeders;

use App\Models\Prestasi;
use Illuminate\Database\Seeder;

class PrestasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Prestasi::create([
            'judul' => 'HAPKIDO HYUNG PUTRA',
            'nama_peraih' => 'SURYO PRAKOSO SUTOPO',
            'kategori' => 'Non Akademik',
            'tingkat' => 'Provinsi',
            'juara' => 'Juara I',
            'tanggal' => '2026-10-08',
            'deskripsi' => 'Peraih Juara  Hapkido Hyung Putra Tingkat Provinsi',
        ]);
    }
}
