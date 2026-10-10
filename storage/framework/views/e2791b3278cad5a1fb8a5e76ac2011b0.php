<?php $__env->startSection('title', 'Ekstrakurikuler & Organisasi'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">

    <!-- JUDUL HALAMAN -->
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h2 class="fw-bold text-dark">Ekstrakurikuler & Organisasi</h2>
            <p class="text-muted">Wadah pengembangan minat, bakat, dan karakter siswa SMAN 1 Yogyakarta.</p>
        </div>
    </div>

    <!-- DAFTAR CARD EKSKUL -->
    <div class="row g-4">
        <?php $__empty_1 = true; $__currentLoopData = $ekskuls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
                // Mengambil Primary Key secara dinamis agar variabel tidak null/kosong
                $idEkskul = $item->getKey() ?? $item->id_ekstrakulikuler ?? $item->id_ekskul ?? $item->id;
                $namaEkskul = $item->nama_ekskul ?? $item->nama_ekstrakulikuler ?? $item->nama;
                $fotoEkskul = $item->foto ?? $item->gambar ?? null;
            ?>
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                    <?php if(!empty($fotoEkskul) && Storage::disk('public')->exists($fotoEkskul)): ?>
                        <img src="<?php echo e(asset('storage/' . $fotoEkskul)); ?>"
                             class="card-img-top"
                             style="height: 200px; object-fit: cover;"
                             alt="<?php echo e($namaEkskul); ?>">
                    <?php else: ?>
                        <img src="https://images.unsplash.com/photo-1511632765486-a01980e01a18?q=80&w=600&auto=format&fit=crop"
                             class="card-img-top"
                             style="height: 200px; object-fit: cover;"
                             alt="Default Ekskul">
                    <?php endif; ?>

                    <div class="card-body p-4 d-flex flex-column">
                        <h5 class="fw-bold text-dark mb-2" style="font-family: var(--font-heading);">
                            <?php echo e($namaEkskul); ?>

                        </h5>

                        <p class="card-text text-muted small mb-4" style="line-height: 1.6;">
                            <?php echo e(Str::limit(strip_tags($item->deskripsi ?? $item->keterangan ?? 'Kegiatan ekstrakurikuler siswa.'), 90)); ?>

                        </p>

                        <!-- TOMBOL DETAIL EKSKUL -->
                        <div class="mt-auto">
                            <a href="<?php echo e(route('public.ekstrakulikuler.show', $item->slug)); ?>" class="btn btn-outline-primary btn-sm w-100 rounded-pill fw-semibold">
                                Lihat Lebih Lengkap <i class="fas fa-chevron-right small ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12 text-center py-5">
                <div class="p-4 bg-light rounded-3">
                    <p class="text-muted mb-0">Belum ada data ekstrakurikuler yang ditampilkan.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('public.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\website_sekolah\resources\views/public/ekstrakulikuler.blade.php ENDPATH**/ ?>