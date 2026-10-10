<?php $__env->startSection('title', 'Berita & Informasi Terbaru'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">

    <!-- TOMBOL KEMBALI KE BERANDA -->

    <!-- JUDUL HALAMAN -->
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h2 class="fw-bold text-dark">Berita & Informasi Terbaru</h2>
            <p class="text-muted">Kabar terkini seputar kegiatan, akademik, dan kabar civitas akademika SMAN 1 Yogyakarta.</p>
        </div>
    </div>

    <!-- DAFTAR CARD BERITA -->
    <div class="row g-4">
        <?php $__empty_1 = true; $__currentLoopData = $beritas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
                // Ambil Primary Key secara aman
                $idBerita = $item->getKey() ?? $item->id_berita ?? $item->id;
                $judulBerita = $item->judul ?? 'Berita Sekolah';
                $fotoBerita = $item->gambar ?? $item->foto ?? null;
            ?>
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                    <?php if(!empty($fotoBerita) && Storage::disk('public')->exists('berita/' . $fotoBerita)): ?>
                        <img src="<?php echo e(asset('storage/berita/' . $fotoBerita)); ?>"
                             class="card-img-top"
                             style="height: 200px; object-fit: cover;"
                             alt="<?php echo e($judulBerita); ?>">
                    <?php elseif(!empty($fotoBerita) && Storage::disk('public')->exists($fotoBerita)): ?>
                        <img src="<?php echo e(asset('storage/' . $fotoBerita)); ?>"
                             class="card-img-top"
                             style="height: 200px; object-fit: cover;"
                             alt="<?php echo e($judulBerita); ?>">
                    <?php else: ?>
                        <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=600&auto=format&fit=crop"
                             class="card-img-top"
                             style="height: 200px; object-fit: cover;"
                             alt="Default Berita">
                    <?php endif; ?>

                    <div class="card-body p-4 d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="badge bg-primary px-2 py-1 rounded-pill"><?php echo e($item->kategori ?? 'Umum'); ?></span>
                            <span class="text-muted small"><i class="far fa-calendar me-1"></i> <?php echo e($item->created_at ? $item->created_at->format('d M Y') : '-'); ?></span>
                        </div>

                        <h5 class="fw-bold text-dark mb-2" style="font-family: var(--font-heading); font-size: 1.15rem;">
                            <?php echo e($judulBerita); ?>

                        </h5>

                        <p class="text-muted small mb-4" style="line-height: 1.6;">
                            <?php echo e(Str::limit(strip_tags($item->konten ?? $item->isi ?? 'Informasi berita sekolah.'), 90)); ?>

                        </p>

                        <!-- TOMBOL BACA SELENGKAPNYA -->
                        <div class="mt-auto">
                            <a href="<?php echo e(route('public.berita.show', $item->slug)); ?>" class="btn btn-outline-primary btn-sm w-100 rounded-pill fw-semibold">
                                Baca Selengkapnya <i class="fas fa-chevron-right small ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12 text-center py-5">
                <div class="p-4 bg-light rounded-3">
                    <p class="text-muted mb-0">Belum ada berita yang ditampilkan.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('public.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\website_sekolah\resources\views/public/berita.blade.php ENDPATH**/ ?>