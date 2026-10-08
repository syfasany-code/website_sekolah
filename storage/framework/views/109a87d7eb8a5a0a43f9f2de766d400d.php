<?php $__env->startSection('title', $ekstrakulikuler->nama_ekskul ?? 'Detail Ekstrakurikuler'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="mb-4">
        <a href="<?php echo e(route('public.ekstrakulikuler')); ?>" class="btn btn-outline-navy btn-sm shadow-sm rounded-pill px-3">
            <i class="fas fa-arrow-left me-1"></i> Kembali ke Ekstrakurikuler
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-body p-4 p-md-5">

                    <h2 class="fw-bold text-dark mb-4 text-center" style="font-family: var(--font-heading);"><?php echo e($ekskul->nama_ekskul); ?></h2>

                    <?php if($ekskul->gambar): ?>
                        <div class="text-center mb-4">
                            <img src="<?php echo e(asset('storage/' . $ekskul->gambar)); ?>"
                                 class="img-fluid rounded-4 shadow-sm w-100"
                                 style="max-height: 420px; object-fit: cover;"
                                 alt="<?php echo e($ekskul->nama_ekskul); ?>">
                        </div>
                    <?php endif; ?>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-3 border-start border-4 border-primary">
                                <span class="text-muted small d-block mb-1"><i class="fas fa-user-tie text-primary me-1"></i> Pembina / Pelatih</span>
                                <strong class="text-dark fs-6"><?php echo e($ekskul->pembina ?? '-'); ?></strong>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-3 border-start border-4 border-warning">
                                <span class="text-muted small d-block mb-1"><i class="fas fa-clock text-warning me-1"></i> Jadwal Latihan</span>
                                <strong class="text-dark fs-6"><?php echo e($ekskul->jadwal_latihan ?? '-'); ?></strong>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div>
                        <h5 class="fw-bold text-dark mb-3"><i class="fas fa-info-circle text-primary me-2"></i>Deskripsi & Kegiatan</h5>
                        <p class="text-muted mb-0" style="white-space: pre-line; line-height: 1.8;">
                            <?php echo e($ekskul->deskripsi ?? 'Belum ada deskripsi untuk ekstrakurikuler ini.'); ?>

                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('public.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\website_sekolah\resources\views/public/ekstrakuLikuler/show.blade.php ENDPATH**/ ?>