<?php $__env->startSection('title', 'Profil Sekolah'); ?>

<?php $__env->startSection('content'); ?>

<style>
    /* Dark Navy Gradient Hero Section */
    .profil-hero {
        background: linear-gradient(135deg, #0b1329 0%, #101f42 50%, #1e293b 100%);
        border-radius: 20px;
        color: #ffffff;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 30px -5px rgba(15, 23, 42, 0.4);
        border: 1px solid rgba(255, 255, 255, 0.08);
    }

    .profil-hero::before {
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

    /* School Logo Frame */
    .school-logo-lg {
        width: 95px;
        height: 95px;
        border-radius: 50%;
        border: 3px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        object-fit: cover;
        background: #0f172a;
    }

    /* Cards Style with Dark Accent Touch */
    .info-card {
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        transition: all 0.3s ease;
        background: #ffffff;
    }

    .info-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 15px 30px -5px rgba(15, 23, 42, 0.12) !important;
        border-color: #cbd5e1;
    }

    .icon-badge {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
    }

    /* Dark Navy Soft Accent Colors */
    .bg-soft-navy    { background-color: #f1f5f9; color: #0f172a; }
    .bg-soft-blue    { background-color: #eff6ff; color: #1d4ed8; }
    .bg-soft-teal    { background-color: #f0fdfa; color: #0d9488; }
    .bg-soft-indigo  { background-color: #eef2ff; color: #4338ca; }

    /* Custom Misi List */
    .misi-list {
        padding-left: 0;
        list-style: none;
    }

    .misi-list li {
        position: relative;
        padding-left: 28px;
        margin-bottom: 12px;
        color: #334155;
        line-height: 1.6;
    }

    .misi-list li::before {
        content: "\F012C"; /* MDI check-circle icon */
        font-family: "Material Design Icons";
        position: absolute;
        left: 0;
        top: 0;
        color: #1e293b;
        font-size: 18px;
    }

    .btn-edit-hero {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.25);
        color: #ffffff;
        backdrop-filter: blur(5px);
        transition: all 0.3s;
    }

    .btn-edit-hero:hover {
        background: #ffffff;
        color: #0f172a;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }
</style>

<div class="container-fluid py-2">

    <!-- 🔷 HERO SECTION: DARK NAVY GRADIENT HEADER -->
    <div class="profil-hero p-4 p-md-5 mb-4">
        <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
            <div class="d-flex flex-column flex-md-row align-items-center text-center text-md-left">

                <!-- LOGO SEKOLAH -->
                <div class="mb-3 mb-md-0 mr-md-4">
                    <?php if(!empty($profilSekolah->logo) && file_exists(public_path('storage/' . $profilSekolah->logo))): ?>
                        <img src="<?php echo e(asset('storage/' . $profilSekolah->logo)); ?>" alt="Logo Sekolah" class="school-logo-lg">
                    <?php else: ?>
                        <div class="school-logo-lg d-flex align-items-center justify-content-center text-white font-weight-bold" style="font-size: 38px;">
                            <i class="mdi mdi-school"></i>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- INFO SINGKAT SEKOLAH -->
                <div>
                    <span class="badge px-3 py-1 rounded-pill font-weight-medium mb-2" style="background: rgba(255,255,255,0.12); color: #cbd5e1; font-size: 12px; border: 1px solid rgba(255,255,255,0.15);">
                        <i class="mdi mdi-card-account-details-outline mr-1 text-info"></i> NPSN: <?php echo e($profilSekolah->npsn ?? '-'); ?>

                    </span>
                    <h2 class="font-weight-bold text-white mb-2" style="letter-spacing: 0.3px;">
                        <?php echo e($profilSekolah->nama_sekolah ?? 'Nama Sekolah Belum Diatur'); ?>

                    </h2>
                    <p class="mb-0 text-white-50 font-weight-normal" style="font-size: 15px;">
                        <i class="mdi mdi-account-tie mr-1 text-white-50"></i> <strong>Kepala Sekolah:</strong> <?php echo e($profilSekolah->kepala_sekolah ?? '-'); ?>

                    </p>
                </div>
            </div>

            <!-- TOMBOL EDIT PROFIL -->
            <div class="mt-4 mt-md-0">
                <a href="<?php echo e(route('admin.profil-sekolah.edit')); ?>" class="btn btn-edit-hero font-weight-semibold rounded-lg px-4 py-2">
                    <i class="mdi mdi-square-edit-outline mr-1"></i> Edit Profil
                </a>
            </div>
        </div>
    </div>

    <!-- 📊 GRID INFORMASI UTAMA -->
    <div class="row">

        <!-- VISI SEKOLAH -->
        <div class="col-lg-6 mb-4">
            <div class="card info-card shadow-sm h-100 p-3">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="icon-badge bg-soft-navy mr-3">
                            <i class="mdi mdi-target"></i>
                        </div>
                        <h5 class="font-weight-bold text-dark mb-0">Visi Sekolah</h5>
                    </div>
                    <p class="text-secondary leading-relaxed mb-0" style="font-size: 15px; line-height: 1.7;">
                        <?php echo e($profilSekolah->visi ?? 'Belum ada data visi sekolah yang diisi.'); ?>

                    </p>
                </div>
            </div>
        </div>

        <!-- MISI SEKOLAH -->
        <div class="col-lg-6 mb-4">
            <div class="card info-card shadow-sm h-100 p-3">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="icon-badge bg-soft-blue mr-3">
                            <i class="mdi mdi-rocket-launch-outline"></i>
                        </div>
                        <h5 class="font-weight-bold text-dark mb-0">Misi Sekolah</h5>
                    </div>

                    <?php if(!empty($profilSekolah->misi)): ?>
                        <ul class="misi-list mb-0">
                            <?php $__currentLoopData = explode('.', $profilSekolah->misi); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(trim($item)): ?>
                                    <li><?php echo e(trim($item)); ?>.</li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php else: ?>
                        <p class="text-secondary mb-0" style="font-size: 15px;">Belum ada data misi sekolah yang diisi.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- ALAMAT SEKOLAH -->
        <div class="col-lg-6 mb-4">
            <div class="card info-card shadow-sm h-100 p-3">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="icon-badge bg-soft-teal mr-3">
                            <i class="mdi mdi-map-marker-radius-outline"></i>
                        </div>
                        <h5 class="font-weight-bold text-dark mb-0">Alamat Lengkap</h5>
                    </div>
                    <p class="text-secondary mb-0" style="font-size: 15px; line-height: 1.7;">
                        <?php echo e($profilSekolah->alamat ?? 'Belum ada data alamat yang diisi.'); ?>

                    </p>
                </div>
            </div>
        </div>

        <!-- DESKRIPSI / PROFIL SINGKAT -->
        <div class="col-lg-6 mb-4">
            <div class="card info-card shadow-sm h-100 p-3">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="icon-badge bg-soft-indigo mr-3">
                            <i class="mdi mdi-text-box-search-outline"></i>
                        </div>
                        <h5 class="font-weight-bold text-dark mb-0">Deskripsi / Ringkasan</h5>
                    </div>
                    <p class="text-secondary mb-0" style="font-size: 15px; line-height: 1.7; white-space: pre-line;">
                        <?php echo e($profilSekolah->deskripsi ?? 'Belum ada deskripsi profil sekolah.'); ?>

                    </p>
                </div>
            </div>
        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\website_sekolah\resources\views/admin/profil-sekolah/profil.blade.php ENDPATH**/ ?>