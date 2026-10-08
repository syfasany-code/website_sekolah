<?php $__env->startSection('title', 'Direktori Guru & Tenaga Pendidik'); ?>

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
            <h2 class="fw-bold text-dark">Direktori Guru & Tenaga Pendidik</h2>
            <p class="text-muted">Mengenal lebih dekat jajaran guru dan staf pengajar kami.</p>
        </div>
    </div>

    <!-- DAFTAR CARD GURU -->
    <div class="row">
        <?php $__empty_1 = true; $__currentLoopData = $guru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
                $idGuru = $item->id_guru ?? $item->id;
                $namaGuru = $item->nama_guru ?? $item->nama;
            ?>
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                    <div class="text-center pt-3 bg-light">
                        <?php if(!empty($item->foto) && Storage::disk('public')->exists($item->foto)): ?>
                            <img src="<?php echo e(asset('storage/' . $item->foto)); ?>"
                                 class="card-img-top rounded-circle shadow-sm"
                                 style="width: 130px; height: 130px; object-fit: cover;"
                                 alt="<?php echo e($namaGuru); ?>">
                        <?php else: ?>
                            <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode($namaGuru)); ?>&background=002147&color=fff"
                                 class="card-img-top rounded-circle shadow-sm"
                                 style="width: 130px; height: 130px; object-fit: cover;"
                                 alt="Avatar Guru">
                        <?php endif; ?>
                    </div>

                    <div class="card-body text-center d-flex flex-column">
                        <h5 class="card-title fw-bold text-dark mb-1"><?php echo e($namaGuru); ?></h5>
                        <p class="card-text text-muted small mb-3"><?php echo e($item->jabatan ?? $item->mapel ?? 'Tenaga Pendidik'); ?></p>

                        <div class="mt-auto">
                            <a href="<?php echo e(route('public.guru.show', $idGuru)); ?>" class="btn btn-outline-primary btn-sm w-100 rounded-pill">
                                Lihat Profil Lengkap
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12 text-center py-5">
                <div class="p-4 bg-light rounded-3">
                    <p class="text-muted mb-0">Belum ada data guru yang ditampilkan.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('public.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\website_sekolah\resources\views/public/guru.blade.php ENDPATH**/ ?>