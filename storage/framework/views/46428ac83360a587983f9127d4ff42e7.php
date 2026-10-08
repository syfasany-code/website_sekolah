<?php $__env->startSection('title', 'Galeri & Dokumentasi Sekolah'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">

    <!-- TOMBOL KEMBALI KE BERANDA -->
    <div class="mb-4">
        <a href="<?php echo e(url('/')); ?>" class="btn btn-outline-navy btn-sm shadow-sm rounded-pill px-3">
            <i class="fas fa-arrow-left me-1"></i> Kembali ke Beranda
        </a>
    </div>

    <!-- JUDUL HALAMAN -->
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h2 class="fw-bold text-dark">Galeri & Dokumentasi Kegiatan</h2>
            <p class="text-muted">Momen berharga, fasilitas, dan dokumentasi ragam aktivitas SMAN 1 Yogyakarta.</p>
        </div>
    </div>

    <!-- DAFTAR FOTO GALERI -->
    <div class="row g-4">
        <?php $__empty_1 = true; $__currentLoopData = $galeris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
                // Ambil Primary Key secara aman
                $idGaleri = $item->getKey() ?? $item->id_galeri ?? $item->id;
                $judulGaleri = $item->judul ?? $item->keterangan ?? $item->nama ?? 'Dokumentasi Kegiatan';
                $fotoGaleri = $item->foto ?? $item->gambar ?? $item->file_path ?? null;
            ?>
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden style-gallery-card">
                    <div class="position-relative">
                        <?php if(!empty($fotoGaleri) && Storage::disk('public')->exists($fotoGaleri)): ?>
                            <img src="<?php echo e(asset('storage/' . $fotoGaleri)); ?>"
                                 class="card-img-top"
                                 style="height: 240px; object-fit: cover;"
                                 alt="<?php echo e($judulGaleri); ?>">
                        <?php else: ?>
                            <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=600&auto=format&fit=crop"
                                 class="card-img-top"
                                 style="height: 240px; object-fit: cover;"
                                 alt="Default Galeri">
                        <?php endif; ?>

                        <div class="gallery-overlay p-3 d-flex flex-column justify-content-end">
                            <span class="text-warning small mb-1">
                                <i class="far fa-calendar me-1"></i> <?php echo e($item->created_at ? $item->created_at->format('d M Y') : '-'); ?>

                            </span>
                            <h6 class="text-white fw-bold mb-0" style="font-family: var(--font-heading);">
                                <?php echo e($judulGaleri); ?>

                            </h6>
                        </div>
                    </div>

                    <div class="card-body p-3 text-center bg-white">
                        <a href="<?php echo e(route('public.galeri.show', $idGaleri)); ?>" class="btn btn-outline-primary btn-sm w-100 rounded-pill fw-semibold">
                            Lihat Foto Lengkap <i class="fas fa-chevron-right small ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12 text-center py-5">
                <div class="p-4 bg-light rounded-3">
                    <p class="text-muted mb-0">Belum ada foto galeri yang ditampilkan.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        .style-gallery-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .style-gallery-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15) !important;
        }
        .gallery-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            top: 0;
            background: linear-gradient(to top, rgba(0, 33, 71, 0.85) 0%, rgba(0, 33, 71, 0) 60%);
        }
    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('public.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\website_sekolah\resources\views/public/galeri.blade.php ENDPATH**/ ?>