<?php $__env->startSection('title', 'Data Siswa - MTsN 10 Tasikmalaya'); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid py-2">
    <div class="row">
        <div class="col-12">

            <div class="card shadow-sm border-0 rounded-3">

                <!-- HEADER -->
                <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                    <h3 class="mb-0 font-weight-bold text-dark">Data Siswa</h3>
                    <?php if(strcasecmp(auth()->user()->role, 'admin') === 0): ?>
                        <a href="<?php echo e(route('admin.siswa.addEdit')); ?>" class="btn btn-primary font-weight-semibold shadow-sm">
                            <i class="mdi mdi-plus mr-1"></i> Tambah Data Siswa
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
                                    <th>Nama Siswa</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tahun Masuk</th>
                                    <th width="20%" class="text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $siswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>

                                    <td class="text-muted"><?php echo e($loop->iteration); ?></td>

                                    <!-- NAMA -->
                                    <td>
                                        <div class="font-weight-semibold text-dark">
                                            <?php echo e($item->nama_siswa); ?>

                                        </div>
                                    </td>

                                    <!-- JENIS KELAMIN -->
                                    <td>
                                        <span class="badge <?php echo e(strtolower($item->jenis_kelamin) == 'l' || strtolower($item->jenis_kelamin) == 'laki-laki' ? 'bg-primary text-white' : 'bg-pink text-white'); ?> px-3 py-2" style="<?php echo e(strtolower($item->jenis_kelamin) != 'l' && strtolower($item->jenis_kelamin) != 'laki-laki' ? 'background-color: #e83e8c;' : ''); ?>">
                                            <?php echo e($item->jenis_kelamin); ?>

                                        </span>
                                    </td>

                                    <!-- TAHUN MASUK -->
                                    <td class="text-muted">
                                        <?php echo e($item->tahun_masuk ?? '-'); ?>

                                    </td>

                                    <!-- AKSI -->
                                    <td class="text-center">
                                        <div class="btn-group" role="group">

                                            <!-- Detail Siswa -->
                                            <a href="<?php echo e(route('admin.siswa.show', Crypt::encrypt($item->id_siswa))); ?>" class="btn btn-info btn-sm text-white" title="Detail Siswa">
                                                <i class="mdi mdi-eye"></i> <span class="d-none d-md-inline ml-1">Detail</span>
                                            </a>

                                            <?php if(strcasecmp(auth()->user()->role, 'admin') === 0): ?>
                                                <!-- Edit Siswa (Menggunakan Crypt::encrypt) -->
                                                <a href="<?php echo e(route('admin.siswa.addEdit', Crypt::encrypt($item->id_siswa))); ?>" class="btn btn-warning btn-sm text-dark font-weight-medium" title="Edit Siswa">
                                                    <i class="mdi mdi-pencil"></i> <span class="d-none d-md-inline ml-1">Edit</span>
                                                </a>

                                                <!-- Hapus Siswa (Menggunakan Crypt::encrypt) -->
                                                <form action="<?php echo e(route('admin.siswa.delete', Crypt::encrypt($item->id_siswa))); ?>" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data siswa ini?')">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-danger btn-sm font-weight-medium" title="Hapus Siswa">
                                                        <i class="mdi mdi-trash-can-outline"></i> <span class="d-none d-md-inline ml-1">Hapus</span>
                                                    </button>
                                                </form>
                                            <?php endif; ?>

                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">
                                        Belum ada data siswa.
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\website_sekolah\resources\views/admin/siswa/index.blade.php ENDPATH**/ ?>