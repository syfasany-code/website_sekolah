<?php $__env->startSection('title', $prestasi->judul ?? 'Detail Prestasi'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="mb-4">
        <a href="<?php echo e(route('public.prestasi')); ?>" class="btn btn-outline-navy btn-sm shadow-sm rounded-pill px-3">
            <i class="fas fa-arrow-left me-1"></i> Kembali ke Daftar Prestasi
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden p-3 p-md-4">
                <div class="card-body">
                    <div class="row gy-4 align-items-center">

                        <div class="col-md-5">
                            <?php if($prestasi->foto): ?>
                                <img src="<?php echo e(asset('storage/' . $prestasi->foto)); ?>"
                                     class="img-fluid rounded-4 shadow-sm w-100"
                                     style="max-height: 380px; object-fit: cover;"
                                     alt="<?php echo e($prestasi->judul); ?>">
                            <?php else: ?>
                                <img src="https://images.unsplash.com/photo-1567427017947-545c5f8d16ad?q=80&w=600&auto=format&fit=crop"
                                     class="img-fluid rounded-4 shadow-sm w-100"
                                     style="max-height: 380px; object-fit: cover;"
                                     alt="Default Prestasi">
                            <?php endif; ?>
                        </div>

                        <div class="col-md-7 ps-md-4">
                            <span class="badge bg-danger px-3 py-2 rounded-pill fw-bold mb-3">
                                <?php echo e($prestasi->tingkat ?? 'Nasional'); ?>

                            </span>

                            <h2 class="fw-bold text-dark mb-4" style="font-family: var(--font-heading);"><?php echo e($prestasi->judul); ?></h2>

                            <div class="mb-4">
                                <div class="d-flex align-items-center mb-2">
                                    <div style="width: 150px;" class="fw-bold text-secondary"><i class="fas fa-user me-2 text-primary"></i>Nama Siswa</div>
                                    <div class="text-dark">: <?php echo e($prestasi->nama_peraih ?? '-'); ?></div>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div style="width: 150px;" class="fw-bold text-secondary"><i class="fas fa-tag me-2 text-primary"></i>Kategori</div>
                                    <div class="text-dark">: <?php echo e($prestasi->kategori ?? '-'); ?></div>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div style="width: 150px;" class="fw-bold text-secondary"><i class="fas fa-trophy me-2 text-warning"></i>Peringkat / Juara</div>
                                    <div class="text-dark">: <?php echo e($prestasi->juara ?? '-'); ?></div>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div style="width: 150px;" class="fw-bold text-secondary"><i class="fas fa-calendar me-2 text-primary"></i>Tahun / Tanggal</div>
                                    <div class="text-dark">: <?php echo e($prestasi->tanggal ? \Carbon\Carbon::parse($prestasi->tanggal)->translatedFormat('d F Y') : '-'); ?></div>
                                </div>
                            </div>

                            <?php if($prestasi->deskripsi): ?>
                                <div class="p-3 bg-light rounded-3 border-start border-4 border-primary">
                                    <h6 class="fw-bold text-dark mb-1"><i class="fas fa-info-circle me-1 text-primary"></i> Keterangan Prestasi</h6>
                                    <p class="text-muted small mb-0"><?php echo e($prestasi->deskripsi); ?></p>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('public.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\website_sekolah\resources\views/public/prestasi/show.blade.php ENDPATH**/ ?>