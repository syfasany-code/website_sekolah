<?php $__env->startSection('title', 'Prestasi Siswa & Sekolah'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">

    <!-- JUDUL HALAMAN -->
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h2 class="fw-bold text-dark">Prestasi Siswa & Sekolah</h2>
            <p class="text-muted">Raihan kebanggaan siswa SMAN 1 Yogyakarta di tingkat regional, nasional, hingga internasional.</p>
        </div>
    </div>

    <!-- DAFTAR CARD PRESTASI -->
    <div class="row g-4">
        <?php $__empty_1 = true; $__currentLoopData = $prestasis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
                // Ambil Primary Key secara aman
                $idPrestasi = $item->getKey() ?? $item->id_prestasi ?? $item->id;
                $judulPrestasi = $item->nama_prestasi ?? $item->judul ?? 'Prestasi Siswa';
                $fotoPrestasi = $item->foto ?? $item->gambar ?? null;
            ?>
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                    <?php if(!empty($fotoPrestasi) && Storage::disk('public')->exists($fotoPrestasi)): ?>
                        <img src="<?php echo e(asset('storage/' . $fotoPrestasi)); ?>"
                             class="card-img-top"
                             style="height: 220px; object-fit: cover;"
                             alt="<?php echo e($judulPrestasi); ?>">
                    <?php else: ?>
                        <img src="https://images.unsplash.com/photo-1567427017947-545c5f8d16ad?q=80&w=600&auto=format&fit=crop"
                             class="card-img-top"
                             style="height: 220px; object-fit: cover;"
                             alt="Default Prestasi">
                    <?php endif; ?>

                    <div class="card-body p-4 d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="badge bg-danger px-2 py-1 rounded-pill"><?php echo e($item->tingkat ?? 'Nasional'); ?></span>
                            <span class="text-warning small fw-bold"><i class="fas fa-trophy me-1"></i> <?php echo e($item->juara ?? 'Juara'); ?></span>
                        </div>

                        <h5 class="fw-bold text-dark mb-2" style="font-family: var(--font-heading);">
                            <?php echo e($judulPrestasi); ?>

                        </h5>

                        <p class="text-muted small mb-3">
                            <i class="fas fa-user me-1 text-secondary"></i> <?php echo e($item->nama_peraih ?? $item->pemenang ?? '-'); ?>

                        </p>

                        <!-- TOMBOL DETAIL PRESTASI -->
                        <div class="mt-auto pt-2">
                            <a href="<?php echo e(route('public.prestasi.show', $idPrestasi)); ?>" class="btn btn-outline-primary btn-sm w-100 rounded-pill fw-semibold">
                                Lihat Lebih Lengkap <i class="fas fa-chevron-right small ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12 text-center py-5">
                <div class="p-4 bg-light rounded-3">
                    <p class="text-muted mb-0">Belum ada data prestasi yang ditampilkan.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('public.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\website_sekolah\resources\views/public/prestasi.blade.php ENDPATH**/ ?>