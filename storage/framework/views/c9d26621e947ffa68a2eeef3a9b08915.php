<?php $__env->startSection('title', 'Detail Guru'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="mb-4">
        <a href="<?php echo e(route('public.guru')); ?>" class="btn btn-light btn-sm shadow-sm rounded-pill px-3">
            <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Direktori Guru
        </a>
    </div>

    <?php
        $namaGuru = $guru->nama_guru ?? $guru->nama;
    ?>

    <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
        <div class="card-body p-4 p-md-5">
            <div class="row align-items-center">
                <div class="col-md-4 text-center mb-4 mb-md-0">
                    <?php if(!empty($guru->foto)): ?>
                        <img src="<?php echo e(asset('storage/' . $guru->foto)); ?>"
                             class="img-fluid rounded-3 shadow"
                             style="max-height: 350px; width: 100%; object-fit: cover;"
                             alt="<?php echo e($namaGuru); ?>">
                    <?php else: ?>
                        <img src="<?php echo e(asset('images/faces/face8.jpg')); ?>"
                             class="img-fluid rounded-3 shadow"
                             style="max-height: 350px; width: 100%; object-fit: cover;"
                             alt="Default Avatar">
                    <?php endif; ?>
                </div>

                <div class="col-md-8">
                    <span class="badge bg-primary px-3 py-2 rounded-pill mb-2">
                        <?php echo e($guru->jabatan ?? 'Guru / Tenaga Pendidik'); ?>

                    </span>
                    <h2 class="fw-bold text-dark mb-3"><?php echo e($namaGuru); ?></h2>
                    <hr class="my-3">

                    <table class="table table-borderless align-middle">
                        <tbody>
                            <tr>
                                <th style="width: 30%;" class="text-muted">NIP / NUPTK</th>
                                <td>: <?php echo e($guru->nip ?? '-'); ?></td>
                            </tr>
                            <tr>
                                <th class="text-muted">Mata Pelajaran</th>
                                <td>: <?php echo e($guru->mapel ?? $guru->mata_pelajaran ?? '-'); ?></td>
                            </tr>
                            <tr>
                                <th class="text-muted">Pendidikan Terakhir</th>
                                <td>: <?php echo e($guru->pendidikan ?? '-'); ?></td>
                            </tr>
                            <tr>
                                <th class="text-muted">Sertifikasi</th>
                                <td>: <?php echo e($guru->sertifikasi ?? 'Sudah Tersertifikasi'); ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <?php if(!empty($guru->bio) || !empty($guru->deskripsi)): ?>
                        <div class="mt-4 p-3 bg-light rounded-3">
                            <h6 class="fw-bold text-dark mb-2">Profil Singkat</h6>
                            <p class="text-muted mb-0" style="white-space: pre-line; line-height: 1.6;">
                                <?php echo e($guru->bio ?? $guru->deskripsi); ?>

                            </p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('public.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\website_sekolah\resources\views/public/guru/show.blade.php ENDPATH**/ ?>