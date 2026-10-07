<?php $__env->startSection('title', 'Kelola Galeri - SMAN 1 Yogyakarta'); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="card shadow-sm border-0 rounded-3">

                <!-- HEADER -->
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Galeri</h3>
                    <a href="<?php echo e(route('admin.galeri.addEdit')); ?>" class="btn btn-primary btn-sm shadow-sm">
                        + Tambah Galeri
                    </a>
                </div>

                <!-- BODY -->
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-hover align-middle text-center">

                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Keterangan</th>
                                    <th>File</th>
                                    <th>Kategori</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $galeri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>

                                    <td class="text-muted"><?php echo e($index + 1); ?></td>

                                    <td>
                                        <div class="fw-semibold">
                                            <?php echo e($item->judul); ?>

                                        </div>
                                    </td>

                                    <td class="text-muted">
                                        <?php echo e($item->keterangan); ?>

                                    </td>

                                    <!-- FILE (IMAGE / VIDEO) -->
                                    <td>
                                        <?php if($item->kategori == 'Foto'): ?>
                                            <img src="<?php echo e(asset('storage/galeri/' . $item->file)); ?>"
                                                 width="70"
                                                 class="rounded-3 shadow-sm">
                                        <?php else: ?>
                                            <span class="badge bg-dark">Video</span>
                                        <?php endif; ?>
                                    </td>

                                    <!-- KATEGORI -->
                                    <td>
                                        <span class="badge
                                            <?php echo e($item->kategori == 'Foto' ? 'bg-success' : 'bg-warning text-dark'); ?>">
                                            <?php echo e($item->kategori); ?>

                                        </span>
                                    </td>

                                    <!-- TANGGAL -->
                                    <td>
                                        <span class="badge bg-primary-subtle text-primary px-3 py-2">
                                            <?php echo e(\Carbon\Carbon::parse($item->tanggal)->format('d M Y')); ?>

                                        </span>
                                    </td>

                                    <!-- AKSI -->
                                    <td  class="tect-center">
                                        <div class="btn-aksi-group" role="group">
                                            <a href="<?php echo e(route('admin.galeri.show', Crypt::encrypt($item->id_galeri))); ?>"class="btn btn-info btn-sm text-white" title="Detail Galeri"aria-label="Detail Galeri">
                                                <i class="mdi mdi-eye"></i> <spanclass="d-none d-md-inline ms-1">Detail</spanclass=>
                                            </a>
                                            <a href="<?php echo e(route('admin.galeri.addEdit', Crypt::encrypt($item->id_galeri))); ?>"class="btn btn-warning btn-sm text-white" title="Edit Galeri"aria-label="Edit Galeri">
                                                <i class="mdi mdi-pencil"></i> <spanclass="d-none d-md-inline ms-1">Edit</spanclass=>
                                            </a>
                                            <form action="<?php echo e(route('admin.galeri.delete', Crypt::encrypt($item->id_galeri))); ?>"
                                                method="POST" class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus Galeri"
                                                    aria-label="Hapus Galeri">
                                                    <i class="mdi mdi-delete"></i> <span
                                                        class="d-none d-md-inline ms-1">Hapus</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">
                                        Belum ada data galeri
                                    </td>
                                </tr>
                                <?php endif; ?>
                            </tbody>

                        </table>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\website_sekolah\resources\views/admin/galeri/index.blade.php ENDPATH**/ ?>