<?php

namespace Database\Seeders;


use App\Models\Ekstrakulikuler;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EkstrakulikulerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ekstrakulikuler::create([
            'nama_ekskul' => 'Pramuka',
            'slug' => Str::slug('Pramuka'),
            'pembina' => 'Bedi Jubaedi',
            'jadwal_latihan' => 'Kamis, 14.00-15.00',
            'deskripsi' => 'Pramuka adalah kegiatan ekstrakulikuler yang bertujuan untuk mengembangkan keterampilan kepemimpinan, kekeluargaan, dan kebersamaan di antara anggota.',
            'gambar' => 'pramuka.jpeg',
        ]);
    }
}
