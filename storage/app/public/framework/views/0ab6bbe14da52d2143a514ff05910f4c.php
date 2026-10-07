<?php $__env->startSection('title', 'Kelola Ekstrakurikuler - SMAN 1 Yogyakarta'); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Ekstrakurikuler</h3>
                    <a href="<?php echo e(route('admin.ekstrakulikuler.addEdit')); ?>" class="btn btn-primary btn-sm shadow-sm"> + Tambah Ekskul</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle text-center">

                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Ekskul</th>
                                    <th>Pembina</th>
                                    <th>Jadwal</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $ekskul; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td class="text-muted"><?php echo e($index + 1); ?></td>

                                    <td>
                                        <div class="fw-semibold">
                                            <?php echo e($item->nama_ekskul); ?>

                                        </div>
                                    </td>

                                    <td class="text-muted"><?php echo e($item->pembina); ?></td>

                                    <td>
                                        <span class="badge bg-primary-subtle text-primary px-3 py-2">
                                            <?php echo e($item->jadwal_latihan); ?>

                                        </span>
                                    </td>

                                    <td>
                                        <span class="badge bg-primary-subtle text-primary px-3 py-2">
                                            <?php echo e($item->deskripsi); ?>

                                        </span>
                                    </td>

                                    <td>
                                        <?php if($item->gambar): ?>
                                            <img src="<?php echo e(asset('storage/' . $item->gambar)); ?>"
                                                 width="55"
                                                 class="rounded-3 shadow-sm">
                                        <?php else: ?>
                                            <span class="text-muted">-</span>
                                        <?php endif; ?>
                                    </td>

                                    <td  class="tect-center">
                                        <div class="btn-aksi-group" role="group">
                                            <a href="<?php echo e(route('admin.ekstrakulikuler.show', Crypt::encrypt($item->id_ekstrakulikuler))); ?>"class="btn btn-info btn-sm text-white" title="Detail Ekstrakulikuler"aria-label="Detail Ekstrakulikuler">
                                                <i class="mdi mdi-eye"></i> <spanclass="d-none d-md-inline ms-1">Detail</spanclass=>
                                            </a>
                                            <a href="<?php echo e(route('admin.ekstrakulikuler.addEdit', Crypt::encrypt($item->id_ekstrakulikuler))); ?>"class="btn btn-warning btn-sm text-white" title="Edit Ekstrakulikuler"aria-label="Edit Ekstrakulikuler">
                                                <i class="mdi mdi-pencil"></i> <spanclass="d-none d-md-inline ms-1">Edit</spanclass=>
                                            </a>
                                            <form action="<?php echo e(route('admin.ekstrakulikuler.delete', Crypt::encrypt($item->id_ekstrakulikuler))); ?>"
                                                method="POST" class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus Ekstrakulikuler"
                                                    aria-label="Hapus Ekstrakulikuler">
                                                    <i class="mdi mdi-delete"></i> <span
                                                        class="d-none d-md-inline ms-1">Hapus</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">
                                        Belum ada data ekstrakurikuler
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\website_sekolah\resources\views/admin/ekstrakulikuler/index.blade.php ENDPATH**/ ?>