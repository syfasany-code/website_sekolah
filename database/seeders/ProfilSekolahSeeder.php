<?php

namespace Database\Seeders;

use App\Models\ProfilSekolah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfilSekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProfilSekolah::create([
            'nama_sekolah'   => 'SMAN 1 Yogyakarta',
            'kepala_sekolah' => 'Ngadiya, S.Pd., M.M.',
            'foto'           => 'default-foto.jpg',
            'logo'           => 'default-logo.png',
            'npsn'           => '19660427',
            'alamat'         => 'Jl. Pendidikan No. 10, Tasikmalaya',
            'kontak'         => '081234567890',
            'visi_misi'      => 'Terwujudnya murid yang religius, berakar budaya bangsa, berprestasi, berwawasan lingkungan serta bercakrawala global
 Melaksanakan pembinaan karakter religius melalui kegiatan keagamaan, pembiasaan nilai luhur serta penguatan sopan santun dan unggah-ungguh. Melaksanakan pelestarian budaya lokal dan nasional melalui kegiatan pembelajaran terintegrasi budaya, festival budaya, seni tradisional, dan kunjungan budaya. Melaksanakan program peningkatan prestasi murid melalui pembelajaran inovatif, kegiatan akademik dan non-akademik serta kerja sama dengan berbagai lembaga pendukung. Melaksanakan program peduli lingkungan melalui kegiatan Adiwiyata, pengelolaan sampah, penghijauan, hemat energi dan air serta pembiasaan menjaga kebersihan sekolah. Melaksanakan berbagai program pengembangan wawasan global melalui pembelajaran kolaboratif, kemitraan serta partisipasi dalam kegiatan dan kompetisi bertaraf internasional.',
            'tahun_berdiri'  => 1990,
            'deskripsi'      => 'asdfghjkl',
        ]);      
    }
}
