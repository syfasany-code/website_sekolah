<?php $__env->startSection('title', 'Kelola Guru - SMAN 1 Yogyakarta'); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="card shadow-sm border-0 rounded-3">

                <!-- HEADER -->
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Guru</h3>
                    <?php if(strcasecmp(auth()->user()->role, 'admin') === 0): ?>
                        <a href="<?php echo e(route('admin.guru.addEdit')); ?>" class="btn btn-primary mb-3">
                            + Tambah Data Guru
                        </a>
                    <?php endif; ?>
                </div>

                <!-- BODY -->
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered table-striped datatable" style="width:100%">

                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Guru</th>
                                    <th>NIP</th>
                                    <th>Mapel</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $guru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>

                                    <td class="text-muted"><?php echo e($index + 1); ?></td>

                                    <!-- NAMA -->
                                    <td>
                                        <div class="fw-semibold">
                                            <?php echo e($item->nama_guru); ?>

                                        </div>
                                    </td>

                                    <!-- NIP -->
                                    <td class="text-muted">
                                        <?php echo e($item->nip); ?>

                                    </td>

                                    <!-- MAPEL -->
                                    <td>
                                        <span class="badge bg-primary-subtle text-primary px-3 py-2">
                                            <?php echo e($item->mapel); ?>

                                        </span>
                                    </td>

                                    <!-- FOTO -->
                                    <td>
                                        <?php if($item->foto): ?>
                                            <img src="<?php echo e(asset('storage/' . $item->foto)); ?>" width="60" class="rounded-circle">
                                        <?php else: ?>
                                            <span class="text-muted">-</span>
                                        <?php endif; ?>
                                    </td>

                                    <!-- AKSI (Khusus Admin) -->

                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="<?php echo e(route('admin.guru.show', Crypt::encrypt($item->id_guru))); ?>" class="btn btn-info btn-sm text-white" title="Detail Guru" aria-label="Detail Guru">
                                                <i class="mdi mdi-eye"></i> <span class="d-none d-md-inline ms-1">Detail</span>
                                            </a>
                                            <?php if(strcasecmp(auth()->user()->role, 'admin') === 0): ?>
                                                <a href="<?php echo e(route('admin.guru.addEdit', Crypt::encrypt($item->id_guru))); ?>" class="btn btn-warning">
                                                    Edit
                                                </a>
                                                <form action="<?php echo e(route('admin.guru.delete', Crypt::encrypt($item->id_guru))); ?>" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="<?php echo e(Auth::user()->role == 'admin' ? 6 : 5); ?>" class="text-center text-muted py-4">
                                        Belum ada data guru
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\website_sekolah\resources\views/admin/guru/index.blade.php ENDPATH**/ ?>