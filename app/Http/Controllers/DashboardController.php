<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Berita;
use App\Models\Guru;
use App\Models\Ekstrakulikuler;
use App\Models\Galeri;
use App\Models\ProfilSekolah;
use App\Models\Prestasi;

class DashboardController extends Controller
{
    public function index()
{
    $profil = ProfilSekolah::first();

    $totalSiswa = Siswa::count();
    $totalGuru = Guru::count();
    $totalEkskul = Ekstrakulikuler::count();
    $totalGaleri = Galeri::count();
    $totalBerita = Berita::count();

    return view('admin.dashboard', compact(
        'profil',
        'totalSiswa',
        'totalGuru',
        'totalEkskul',
        'totalGaleri',
        'totalBerita'
    ));
}


    public function publicDashboard()
    {
        // Ambil data dari database (sesuaikan urutan/limit jika perlu)
        $profil = ProfilSekolah::first();
        $beritas = Berita::latest()->take(3)->get();
        $prestasis = Prestasi::latest()->take(3)->get();
        $ekskuls = Ekstrakulikuler::latest()->take(4)->get();
        $gurus = Guru::latest()->take(3)->get();
        $galeris = Galeri::latest()->take(3)->get();

        // Kirim variabel ke view
        return view('public.dashboard', compact('profil','beritas', 'prestasis', 'ekskuls', 'gurus', 'galeris'));
    }
}
