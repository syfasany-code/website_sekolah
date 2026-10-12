<?php $__env->startSection('title', 'Data Kelas - SMA 1 Yogyakarta'); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid py-2">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0 rounded-3">

                <!-- HEADER -->
                <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                    <h3 class="mb-0 font-weight-bold text-dark">Data Kelas</h3>
                    <?php if(strcasecmp(auth()->user()->role, 'admin') === 0): ?>
                        <a href="<?php echo e(route('admin.kelas.form')); ?>" class="btn btn-primary font-weight-semibold shadow-sm">
                            <i class="mdi mdi-plus mr-1"></i> Tambah Data Kelas
                        </a>
                    <?php endif; ?>
                </div>

                <!-- BODY -->
                <div class="card-body p-4">

                    <!-- ALERT NOTIFIKASI -->
                    <?php if(session('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                            <i class="mdi mdi-check-circle mr-1"></i> <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(session('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                            <i class="mdi mdi-alert-circle mr-1"></i> <?php echo e(session('error')); ?>

                        </div>
                    <?php endif; ?>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped datatable align-middle" style="width:100%">
                            <thead class="table-light">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nama Kelas</th>
                                    <th width="20%" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $kelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td class="text-muted"><?php echo e($loop->iteration); ?></td>
                                    <td>
                                        <div class="font-weight-semibold text-dark">
                                            <?php echo e($item->nama_kelas); ?>

                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <?php if(strcasecmp(auth()->user()->role, 'admin') === 0): ?>
                                                <!-- Edit Kelas -->
                                                <a href="<?php echo e(route('admin.kelas.form', Crypt::encrypt($item->id))); ?>" class="btn btn-warning btn-sm text-dark font-weight-medium" title="Edit Kelas">
                                                    <i class="mdi mdi-pencil"></i> <span class="d-none d-md-inline ml-1">Edit</span>
                                                </a>

                                                <!-- Hapus Kelas -->
                                                <form action="<?php echo e(route('admin.kelas.destroy', Crypt::encrypt($item->id))); ?>" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data kelas ini?')">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-danger btn-sm font-weight-medium" title="Hapus Kelas">
                                                        <i class="mdi mdi-trash-can-outline"></i> <span class="d-none d-md-inline ml-1">Hapus</span>
                                                    </button>
                                                </form>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-4">
                                        Belum ada data kelas.
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\website_sekolah\resources\views/admin/kelas/index.blade.php ENDPATH**/ ?>