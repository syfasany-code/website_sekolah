<?php $__env->startSection('title', $galeri->judul ?? 'Detail Dokumentasi'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">

    <!-- TOMBOL KEMBALI KE LIST GALERI -->
    <div class="mb-4">
        <a href="<?php echo e(route('public.galeri')); ?>" class="btn btn-outline-navy btn-sm shadow-sm rounded-pill px-3">
            <i class="fas fa-arrow-left me-1"></i> Kembali ke Galeri
        </a>
    </div>

    <?php
        $judulGaleri = $galeri->judul ?? $galeri->keterangan ?? $galeri->nama ?? 'Dokumentasi Sekolah';
        $fotoGaleri = $galeri->foto ?? $galeri->gambar ?? $galeri->file_path ?? null;
    ?>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-body p-4 p-md-5">

                    <!-- JUDUL & TANGGAL -->
                    <div class="mb-3 text-center">
                        <span class="text-muted small">
                            <i class="far fa-calendar me-1 text-primary"></i> Diunggah pada: <?php echo e($galeri->created_at ? $galeri->created_at->format('d F Y') : '-'); ?>

                        </span>
                        <h2 class="fw-bold text-dark mt-2" style="font-family: var(--font-heading);"><?php echo e($judulGaleri); ?></h2>
                    </div>

                    <!-- FOTO UKURAN PENUH -->
                    <div class="text-center my-4">
                        <?php if(!empty($fotoGaleri) && Storage::disk('public')->exists($fotoGaleri)): ?>
                            <img src="<?php echo e(asset('storage/' . $fotoGaleri)); ?>"
                                 class="img-fluid rounded-4 shadow-sm w-100"
                                 style="max-height: 520px; object-fit: contain; background-color: #f8f9fa;"
                                 alt="<?php echo e($judulGaleri); ?>">
                        <?php else: ?>
                            <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=600&auto=format&fit=crop"
                                 class="img-fluid rounded-4 shadow-sm w-100"
                                 style="max-height: 520px; object-fit: cover;"
                                 alt="Default Galeri">
                        <?php endif; ?>
                    </div>

                    <hr class="my-4">

                    <!-- DESKRIPSI KETERANGAN FOTO -->
                    <div class="p-3 bg-light rounded-3">
                        <h6 class="fw-bold text-dark mb-2"><i class="fas fa-info-circle me-2 text-primary"></i>Keterangan Dokumentasi</h6>
                        <p class="text-muted mb-0" style="white-space: pre-line; line-height: 1.7;">
                            <?php echo e($galeri->deskripsi ?? $galeri->keterangan ?? 'Belum ada keterangan detail untuk foto dokumentasi ini.'); ?>

                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('public.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\website_sekolah\resources\views/public/galeri/show.blade.php ENDPATH**/ ?>