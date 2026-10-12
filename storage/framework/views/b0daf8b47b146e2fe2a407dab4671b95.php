

<?php $__env->startSection('title', 'Profil Pembuat - Raka Danendra Pranajaya Wardoyo'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="mb-4">
        <a href="<?php echo e(url('/')); ?>" class="btn btn-outline-navy btn-sm shadow-sm rounded-pill px-3">
            <i class="fas fa-arrow-left me-1"></i> Kembali ke Beranda
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden p-3 p-md-4">
                <div class="card-body">
                    <div class="row gy-4 align-items-center">

                        <!-- Foto Pembuat -->
                        <div class="col-md-5">
                            <img src="<?php echo e(asset('images/281ccf1c0c247a05cbf3a51ceabee60d_0.jpeg')); ?>"
                                 class="img-fluid rounded-4 shadow-sm w-100"
                                 style="max-height: 380px; object-fit: cover;"
                                 alt="Yasyfa Hidayanti">
                        </div>

                        <!-- Informasi Profil / Biodata -->
                        <div class="col-md-7 ps-md-4">
                            <span class="badge bg-primary px-3 py-2 rounded-pill fw-bold mb-3">
                                Web Developer & Creator
                            </span>

                            <h2 class="fw-bold text-dark mb-4" style="font-family: var(--font-heading);">
                                PROFIL PEMBUAT WEBSITE
                            </h2>

                            <div class="mb-4">
                                <div class="d-flex align-items-center mb-2">
                                    <div style="width: 150px;" class="fw-bold text-secondary">
                                        <i class="fas fa-user me-2 text-primary"></i>Nama Lengkap
                                    </div>
                                    <div class="text-dark">: YASYFA HIDAYANTI</div>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div style="width: 150px;" class="fw-bold text-secondary">
                                        <i class="fas fa-code me-2 text-primary"></i>Keahlian / Role
                                    </div>
                                    <div class="text-dark">: Full-Stack Developer & UI/UX</div>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div style="width: 150px;" class="fw-bold text-secondary">
                                        <i class="fas fa-laptop-code me-2 text-warning"></i>Status Proyek
                                    </div>
                                    <div class="text-dark">: Pengembang Utama Landing Page</div>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div style="width: 150px;" class="fw-bold text-secondary">
                                        <i class="fas fa-calendar-alt me-2 text-primary"></i>Tahun Pembuatan
                                    </div>
                                    <div class="text-dark">: 2026</div>
                                </div>
                            </div>

                            <!-- Bio / Deskripsi Pembuat -->
                            <div class="p-3 bg-light rounded-3 border-start border-4 border-primary">
                                <h6 class="fw-bold text-dark mb-1">
                                    <i class="fas fa-info-circle me-1 text-primary"></i> Tentang Saya
                                </h6>
                                <p class="text-muted small mb-0">
                                    Halo! Saya Yasyfa Hidayanti, pengembang di balik pembuatan website ini. Website ini dirancang dan dibangun untuk memberikan performa yang cepat, tampilan yang responsif, serta pengalaman pengguna yang optimal.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('public.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\website_sekolah\resources\views/public/pembuat.blade.php ENDPATH**/ ?>