@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')

<!-- CSS CUSTOM UNTUK DASHBOARD ELEGAN DARK NAVY GRADIENT -->
<style>
    /* Hero Banner Dark Navy Gradient (Senada dengan Profil Sekolah) */
    .dashboard-hero {
        background: linear-gradient(135deg, #0b1329 0%, #101f42 50%, #1e293b 100%);
        border-radius: 20px;
        color: #ffffff;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 30px -5px rgba(15, 23, 42, 0.4);
        border: 1px solid rgba(255, 255, 255, 0.08);
    }

    .dashboard-hero::before {
        content: '';
        position: absolute;
        top: -50px;
        right: -50px;
        width: 250px;
        height: 250px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(59, 130, 246, 0.15) 0%, rgba(255, 255, 255, 0) 70%);
        pointer-events: none;
    }

    /* Stat Cards Style */
    .stat-card {
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        background: #ffffff;
        position: relative;
        overflow: hidden;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px -5px rgba(15, 23, 42, 0.12) !important;
        border-color: #cbd5e1;
    }

    .stat-icon-wrapper {
        width: 54px;
        height: 54px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 26px;
    }

    /* Accent Colors untuk Icon Wrapper */
    .bg-soft-navy    { background-color: #f1f5f9; color: #0f172a; }
    .bg-soft-blue    { background-color: #eff6ff; color: #1d4ed8; }
    .bg-soft-teal    { background-color: #f0fdfa; color: #0d9488; }
    .bg-soft-indigo  { background-color: #eef2ff; color: #4338ca; }
    .bg-soft-amber   { background-color: #fffbeb; color: #d97706; }
    .bg-soft-rose    { background-color: #fff1f2; color: #e11d48; }

    /* Action Link */
    .stat-link {
        font-size: 13px;
        font-weight: 600;
        text-decoration: none !important;
        display: inline-flex;
        align-items: center;
        transition: transform 0.2s;
        color: #0f172a;
    }

    .stat-card:hover .stat-link {
        transform: translateX(4px);
        color: #1d4ed8;
    }

    /* School Logo Frame */
    .school-logo-frame {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        border: 3px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        object-fit: cover;
        background: #0f172a;
    }
</style>

<div class="container-fluid py-2">

    <!-- PROFIL SEKOLAH (HERO WELCOME BANNER) -->
    <div class="dashboard-hero p-4 p-md-5 mb-4">
        <div class="row align-items-center">
            <div class="col-auto text-center mb-3 mb-md-0">
                @if(!empty($profil->logo) && Storage::disk('public')->exists('sekolah/' . $profil->logo))
                    <img src="{{ asset('storage/sekolah/' . $profil->logo) }}" alt="Logo" class="school-logo-frame">
                @elseif(!empty($profil->logo) && Storage::disk('public')->exists($profil->logo))
                    <img src="{{ asset('storage/' . $profil->logo) }}" alt="Logo" class="school-logo-frame">
                @elseif(file_exists(public_path('images/sman1.png')))
                    <img src="{{ asset('images/sman1.png') }}" alt="Logo" class="school-logo-frame">
                @else
                    <div class="school-logo-frame d-flex align-items-center justify-content-center text-white font-weight-bold" style="font-size: 36px;">
                        <i class="mdi mdi-school"></i>
                    </div>
                @endif
            </div>

            <div class="col pl-md-4">
                <div class="d-flex align-items-center mb-2">
                    <span class="badge px-3 py-1 rounded-pill font-weight-medium mr-2" style="background: rgba(255,255,255,0.12); color: #cbd5e1; font-size: 12px; border: 1px solid rgba(255,255,255,0.15);">
                        <i class="mdi mdi-check-decagram text-info mr-1"></i> Panel Admin Utama
                    </span>
                    <small class="text-white-50"><i class="mdi mdi-clock-outline mr-1"></i> {{ date('l, d F Y') }}</small>
                </div>

                <h2 class="font-weight-bold text-white mb-2" style="letter-spacing: 0.3px;">
                    Selamat Datang di {{ $profil->nama_sekolah ?? 'Sistem Informasi Sekolah' }}
                </h2>

                <p class="mb-0 text-white-50 font-weight-normal" style="font-size: 15px;">
                    <i class="mdi mdi-account-tie mr-1"></i> <strong>Kepala Sekolah:</strong> {{ $profil->kepala_sekolah ?? 'Belum Diatur' }}
                    <span class="mx-2">•</span>
                    <i class="mdi mdi-map-marker mr-1"></i> {{ $profil->alamat ?? 'Alamat Belum Diisi' }}
                </p>
            </div>
        </div>
    </div>

    <!-- HEADER TITLE -->
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h5 class="font-weight-bold text-dark mb-0">
            <i class="mdi mdi-view-dashboard-outline text-dark mr-2"></i> Ringkasan & Menu Cepat
        </h5>
        <span class="text-muted small">Kelola 6 modul utama sistem dalam satu klik</span>
    </div>

    <!-- MENU & KARTU STATISTIK (6 KARTU SIMETRIS: 3 BARIS X 2 KOLOM ATAU 2 BARIS X 3 KOLOM) -->
    <div class="row">

        <!-- 1. KARTU SISWA -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card stat-card shadow-sm h-100 p-3">
                <div class="card-body p-2 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted text-uppercase font-weight-bold d-block mb-1" style="font-size: 12px; letter-spacing: 0.5px;">Data Siswa</span>
                        <h2 class="font-weight-bold text-dark mb-0">{{ number_format($totalSiswa ?? 0) }}</h2>
                        <a href="{{ route('admin.siswa.index') }}" class="stat-link mt-2">
                            Lihat Detail <i class="mdi mdi-arrow-right ml-1"></i>
                        </a>
                    </div>
                    <div class="stat-icon-wrapper bg-soft-navy">
                        <i class="mdi mdi-account-group"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. KARTU GURU -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card stat-card shadow-sm h-100 p-3">
                <div class="card-body p-2 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted text-uppercase font-weight-bold d-block mb-1" style="font-size: 12px; letter-spacing: 0.5px;">Tenaga Pengajar</span>
                        <h2 class="font-weight-bold text-dark mb-0">{{ number_format($totalGuru ?? 0) }}</h2>
                        <a href="{{ route('admin.guru.index') }}" class="stat-link mt-2">
                            Lihat Detail <i class="mdi mdi-arrow-right ml-1"></i>
                        </a>
                    </div>
                    <div class="stat-icon-wrapper bg-soft-blue">
                        <i class="mdi mdi-account-tie-voice"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. KARTU BERITA -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card stat-card shadow-sm h-100 p-3">
                <div class="card-body p-2 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted text-uppercase font-weight-bold d-block mb-1" style="font-size: 12px; letter-spacing: 0.5px;">Artikel & Berita</span>
                        <h2 class="font-weight-bold text-dark mb-0">{{ number_format($totalBerita ?? 0) }}</h2>
                        <a href="{{ route('admin.berita.index') }}" class="stat-link mt-2">
                            Kelola Berita <i class="mdi mdi-arrow-right ml-1"></i>
                        </a>
                    </div>
                    <div class="stat-icon-wrapper bg-soft-amber">
                        <i class="mdi mdi-newspaper-variant-outline"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. KARTU PRESTASI SISWA (TAMBAHAN REVISI) -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card stat-card shadow-sm h-100 p-3">
                <div class="card-body p-2 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted text-uppercase font-weight-bold d-block mb-1" style="font-size: 12px; letter-spacing: 0.5px;">Prestasi Siswa</span>
                        <h2 class="font-weight-bold text-dark mb-0">{{ number_format($totalPrestasi ?? 0) }}</h2>
                        <a href="{{ route('admin.prestasi.index') }}" class="stat-link mt-2">
                            Kelola Prestasi <i class="mdi mdi-arrow-right ml-1"></i>
                        </a>
                    </div>
                    <div class="stat-icon-wrapper bg-soft-rose">
                        <i class="mdi mdi-trophy-outline"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- 5. KARTU GALERI -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card stat-card shadow-sm h-100 p-3">
                <div class="card-body p-2 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted text-uppercase font-weight-bold d-block mb-1" style="font-size: 12px; letter-spacing: 0.5px;">Dokumentasi Galeri</span>
                        <h2 class="font-weight-bold text-dark mb-0">{{ number_format($totalGaleri ?? 0) }}</h2>
                        <a href="{{ route('admin.galeri.index') }}" class="stat-link mt-2">
                            Lihat Foto <i class="mdi mdi-arrow-right ml-1"></i>
                        </a>
                    </div>
                    <div class="stat-icon-wrapper bg-soft-teal">
                        <i class="mdi mdi-image-multiple-outline"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- 6. KARTU EKSTRAKURIKULER -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card stat-card shadow-sm h-100 p-3">
                <div class="card-body p-2 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted text-uppercase font-weight-bold d-block mb-1" style="font-size: 12px; letter-spacing: 0.5px;">Ekstrakulikuler</span>
                        <h2 class="font-weight-bold text-dark mb-0">{{ number_format($totalEkskul ?? 0) }}</h2>
                        <a href="{{ route('admin.ekstrakulikuler.index') }}" class="stat-link mt-2">
                            Kelola Ekskul <i class="mdi mdi-arrow-right ml-1"></i>
                        </a>
                    </div>
                    <div class="stat-icon-wrapper bg-soft-indigo">
                        <i class="mdi mdi-basketball"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection
