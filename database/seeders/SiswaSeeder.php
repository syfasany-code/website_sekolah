<?php

namespace Database\Seeders;

use App\Models\Siswa;

use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Siswa::create([
           'nisn' => '0094403322',
           'nama_siswa' => 'Yasyfa Hidayanti',
           'jenis_kelamin' => 'Perempuan',
           'tahun_masuk' => 2021
        ]);
    }
}
