<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Guru::create([
            'nama_guru' => 'Ida Haerani S.Pd',
            'nip' => '328899776655',
            'mapel' => 'IPA',
        ]);
    }
}
