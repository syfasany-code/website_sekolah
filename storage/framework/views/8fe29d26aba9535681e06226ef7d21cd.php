<?php $__env->startSection('title', 'Detail Siswa'); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm rounded-lg overflow-hidden">
                <!-- HEADER -->
                <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <a href="<?php echo e(route('admin.siswa.index')); ?>" class="btn btn-icon btn-light btn-sm mr-3" title="Kembali">
                            <i class="mdi mdi-arrow-left"></i>
                        </a>
                        <h5 class="mb-0 font-weight-bold text-dark">Detail Data Siswa</h5>
                    </div>
                </div>

                <!-- BODY -->
                <div class="card-body p-4">

                    <!-- PROFIL HEADER -->
                    <div class="text-center mb-4 pb-3 border-bottom">
                        <div class="avatar-wrapper mb-3">
                            <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center shadow-sm" style="width: 70px; height: 70px; font-size: 28px;">
                                <i class="mdi mdi-account"></i>
                            </div>
                        </div>
                        <h4 class="font-weight-bold text-dark mb-1">
                            <?php echo e($siswa->nama_siswa); ?>

                        </h4>
                        <span class="badge badge-light border text-muted px-3 py-2 rounded-pill">
                            <i class="mdi mdi-card-account-details-outline mr-1"></i> NISN: <?php echo e($siswa->nisn); ?>

                        </span>
                    </div>

                    <!-- DETAIL INFORMASI -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="p-3 bg-light rounded">
                                <small class="text-muted d-block text-uppercase font-weight-bold mb-1" style="font-size: 11px;">NISN</small>
                                <span class="font-weight-medium text-dark h6 mb-0"><?php echo e($siswa->nisn); ?></span>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="p-3 bg-light rounded">
                                <small class="text-muted d-block text-uppercase font-weight-bold mb-1" style="font-size: 11px;">Jenis Kelamin</small>
                                <span class="badge badge-primary px-3 py-2 font-weight-medium">
                                    <?php echo e($siswa->jenis_kelamin); ?>

                                </span>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="p-3 bg-light rounded">
                                <small class="text-muted d-block text-uppercase font-weight-bold mb-1" style="font-size: 11px;">Tahun Masuk</small>
                                <span class="font-weight-medium text-dark h6 mb-0"><?php echo e($siswa->tahun_masuk); ?></span>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="p-3 bg-light rounded">
                                <small class="text-muted d-block text-uppercase font-weight-bold mb-1" style="font-size: 11px;">Tanggal Terdaftar</small>
                                <span class="font-weight-medium text-dark h6 mb-0">
                                    <?php echo e(\Carbon\Carbon::parse($siswa->created_at)->translatedFormat('d F Y')); ?>

                                </span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\website_sekolah\resources\views/admin/siswa/show.blade.php ENDPATH**/ ?>