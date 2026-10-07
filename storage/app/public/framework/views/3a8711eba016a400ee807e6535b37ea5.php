<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-8 mx-auto grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="card-title mb-0">Detail Prestasi</h4>
                    <a href="<?php echo e(route('admin.prestasi.index')); ?>" class="btn btn-secondary btn-sm">
                        <i class="fa-solid fa-arrow-left"></i> Kembali
                    </a>
                </div>
                <hr>

                <div class="text-center mb-4">
                    <?php if($prestasi->foto): ?>
                        <img src="<?php echo e(asset('storage/' . $prestasi->foto)); ?>" class="img-fluid rounded" style="max-height: 280px; object-fit: cover;" alt="Foto Prestasi">
                    <?php else: ?>
                        <img src="<?php echo e(asset('images/faces/face8.jpg')); ?>" class="img-fluid rounded" style="max-height: 180px;" alt="Default Image">
                    <?php endif; ?>
                </div>

                <table class="table table-borderless">
                    <tr>
                        <th style="width: 30%;">Judul Prestasi</th>
                        <td>: <strong><?php echo e($prestasi->judul); ?></strong></td>
                    </tr>
                    <tr>
                        <th>Nama Peraih</th>
                        <td>: <?php echo e($prestasi->nama_peraih); ?></td>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <td>: <span class="badge badge-info"><?php echo e($prestasi->kategori); ?></span></td>
                    </tr>
                    <tr>
                        <th>Tingkat</th>
                        <td>: <span class="badge badge-success"><?php echo e($prestasi->tingkat); ?></span></td>
                    </tr>
                    <tr>
                        <th>Capaian Juara</th>
                        <td>: <?php echo e($prestasi->juara); ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Peroleh</th>
                        <td>: <?php echo e(\Carbon\Carbon::parse($prestasi->tanggal)->translatedFormat('d F Y')); ?></td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>: <?php echo e($prestasi->deskripsi ?? '-'); ?></td>
                    </tr>
                </table>

                <div class="mt-4 text-right">
                    <a href="<?php echo e(route('admin.prestasi.addEdit', $prestasi->id)); ?>" class="btn btn-warning text-white">
                        <i class="fa-solid fa-pen-to-square"></i> Edit
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\website_sekolah\resources\views/admin/prestasi/show.blade.php ENDPATH**/ ?>