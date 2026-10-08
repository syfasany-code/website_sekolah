<?php $__env->startSection('title', 'Dashboard Admin'); ?>

<?php $__env->startSection('content'); ?>

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

    <!-- 🔷 PROFIL SEKOLAH (HERO WELCOME BANNER) -->
    <div class="dashboard-hero p-4 p-md-5 mb-4">
        <div class="row align-items-center">
            <div class="col-auto text-center mb-3 mb-md-0">
                <?php if(!empty($profil->logo) && file_exists(public_path('storage/'.$profil->logo))): ?>
                    <img src="<?php echo e(asset('storage/'.$profil->logo)); ?>" alt="Logo" class="school-logo-frame">
                <?php else: ?>
                    <div class="school-logo-frame d-flex align-items-center justify-content-center text-white font-weight-bold" style="font-size: 36px;">
                        <i class="mdi mdi-school"></i>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col pl-md-4">
                <div class="d-flex align-items-center mb-2">
                    <span class="badge px-3 py-1 rounded-pill font-weight-medium mr-2" style="background: rgba(255,255,255,0.12); color: #cbd5e1; font-size: 12px; border: 1px solid rgba(255,255,255,0.15);">
                        <i class="mdi mdi-check-decagram text-info mr-1"></i> Panel Admin Utama
                    </span>
                    <small class="text-white-50"><i class="mdi mdi-clock-outline mr-1"></i> <?php echo e(date('l, d F Y')); ?></small>
                </div>

                <h2 class="font-weight-bold text-white mb-2" style="letter-spacing: 0.3px;">
                    Selamat Datang di <?php echo e($profil->nama_sekolah ?? 'Sistem Informasi Sekolah'); ?>

                </h2>

                <p class="mb-0 text-white-50 font-weight-normal" style="font-size: 15px;">
                    <i class="mdi mdi-account-tie mr-1"></i> <strong>Kepala Sekolah:</strong> <?php echo e($profil->kepala_sekolah ?? 'Belum Diatur'); ?>

                    <span class="mx-2">•</span>
                    <i class="mdi mdi-map-marker mr-1"></i> <?php echo e($profil->alamat ?? 'Alamat Belum Diisi'); ?>

                </p>
            </div>
        </div>
    </div>

    <!-- 📊 HEADER TITLE -->
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h5 class="font-weight-bold text-dark mb-0">
            <i class="mdi mdi-view-dashboard-outline text-dark mr-2"></i> Ringkasan & Menu Cepat
        </h5>
        <span class="text-muted small">Kelola data sistem dalam satu klik</span>
    </div>

    <!-- 🔥 MENU & KARTU STATISTIK -->
    <div class="row">

        <!-- KARTU SISWA -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card stat-card shadow-sm h-100 p-3">
                <div class="card-body p-2 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted text-uppercase font-weight-bold d-block mb-1" style="font-size: 12px; letter-spacing: 0.5px;">Data Siswa</span>
                        <h2 class="font-weight-bold text-dark mb-0"><?php echo e(number_format($totalSiswa ?? 0)); ?></h2>
                        <a href="<?php echo e(route('admin.siswa.index')); ?>" class="stat-link mt-2">
                            Lihat Detail <i class="mdi mdi-arrow-right ml-1"></i>
                        </a>
                    </div>
                    <div class="stat-icon-wrapper bg-soft-navy">
                        <i class="mdi mdi-account-group"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- KARTU GURU -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card stat-card shadow-sm h-100 p-3">
                <div class="card-body p-2 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted text-uppercase font-weight-bold d-block mb-1" style="font-size: 12px; letter-spacing: 0.5px;">Tenaga Pengajar</span>
                        <h2 class="font-weight-bold text-dark mb-0"><?php echo e(number_format($totalGuru ?? 0)); ?></h2>
                        <a href="<?php echo e(route('admin.guru.index')); ?>" class="stat-link mt-2">
                            Lihat Detail <i class="mdi mdi-arrow-right ml-1"></i>
                        </a>
                    </div>
                    <div class="stat-icon-wrapper bg-soft-blue">
                        <i class="mdi mdi-account-tie-voice"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- KARTU BERITA -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card stat-card shadow-sm h-100 p-3">
                <div class="card-body p-2 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted text-uppercase font-weight-bold d-block mb-1" style="font-size: 12px; letter-spacing: 0.5px;">Artikel & Berita</span>
                        <h2 class="font-weight-bold text-dark mb-0"><?php echo e(number_format($totalBerita ?? 0)); ?></h2>
                        <a href="<?php echo e(route('admin.berita.index')); ?>" class="stat-link mt-2">
                            Kelola Berita <i class="mdi mdi-arrow-right ml-1"></i>
                        </a>
                    </div>
                    <div class="stat-icon-wrapper bg-soft-amber">
                        <i class="mdi mdi-newspaper-variant-outline"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- KARTU GALERI -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card stat-card shadow-sm h-100 p-3">
                <div class="card-body p-2 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted text-uppercase font-weight-bold d-block mb-1" style="font-size: 12px; letter-spacing: 0.5px;">Dokumentasi Galeri</span>
                        <h2 class="font-weight-bold text-dark mb-0"><?php echo e(number_format($totalGaleri ?? 0)); ?></h2>
                        <a href="<?php echo e(route('admin.galeri.index')); ?>" class="stat-link mt-2">
                            Lihat Foto <i class="mdi mdi-arrow-right ml-1"></i>
                        </a>
                    </div>
                    <div class="stat-icon-wrapper bg-soft-teal">
                        <i class="mdi mdi-image-multiple-outline"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- KARTU EKSKUL -->
        <div class="col-xl-6 col-md-12 mb-4">
            <div class="card stat-card shadow-sm h-100 p-3">
                <div class="card-body p-2 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted text-uppercase font-weight-bold d-block mb-1" style="font-size: 12px; letter-spacing: 0.5px;">Ekstrakulikuler</span>
                        <h2 class="font-weight-bold text-dark mb-0"><?php echo e(number_format($totalEkskul ?? 0)); ?></h2>
                        <a href="<?php echo e(route('admin.ekstrakulikuler.index')); ?>" class="stat-link mt-2">
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\website_sekolah\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>