<?php $__env->startSection('title', 'Data Prestasi - SMAN 1 Yogyakarta'); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid py-2">
    <div class="row">
        <div class="col-12">

            <div class="card shadow-sm border-0 rounded-3">

                <!-- HEADER -->
                <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                    <h3 class="mb-0 font-weight-bold text-dark">Data Prestasi</h3>
                    <?php if(strcasecmp(auth()->user()->role, 'admin') === 0): ?>
                        <a href="<?php echo e(route('admin.prestasi.addEdit')); ?>" class="btn btn-primary font-weight-semibold shadow-sm">
                            <i class="mdi mdi-plus mr-1"></i> Tambah Data Prestasi
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
                                    <th>Judul Lomba / Prestasi</th>
                                    <th>Nama Peraih</th>
                                    <th>Kategori</th>
                                    <th>Tingkat</th>
                                    <th>Juara</th>
                                    <th class="text-center" width="8%">Foto</th>
                                    <th width="20%" class="text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $prestasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>

                                    <td class="text-muted"><?php echo e($loop->iteration); ?></td>

                                    <!-- JUDUL PRESTASI -->
                                    <td>
                                        <div class="font-weight-semibold text-dark">
                                            <?php echo e($item->judul); ?>

                                        </div>
                                    </td>

                                    <!-- NAMA PERAIH -->
                                    <td><?php echo e($item->nama_peraih ?? '-'); ?></td>

                                    <!-- KATEGORI -->
                                    <td>
                                        <span class="badge bg-info text-white px-3 py-2">
                                            <?php echo e($item->kategori ?? '-'); ?>

                                        </span>
                                    </td>

                                    <!-- TINGKAT -->
                                    <td>
                                        <span class="badge bg-success text-white px-3 py-2">
                                            <?php echo e($item->tingkat ?? '-'); ?>

                                        </span>
                                    </td>

                                    <!-- JUARA -->
                                    <td>
                                        <span class="font-weight-bold text-dark">
                                            <?php echo e($item->juara ?? '-'); ?>

                                        </span>
                                    </td>

                                    <!-- FOTO -->
                                    <td class="text-center">
                                        <?php if($item->foto): ?>
                                            <img src="<?php echo e(asset('storage/' . $item->foto)); ?>" alt="Foto" class="rounded-circle" width="40" height="40" style="object-fit: cover;">
                                        <?php else: ?>
                                            <div class="bg-secondary text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                <i class="mdi mdi-trophy"></i>
                                            </div>
                                        <?php endif; ?>
                                    </td>

                                    <!-- AKSI -->
                                    <td  class="tect-center">
                                        <div class="btn-aksi-group" role="group">
                                            <a href="<?php echo e(route('admin.prestasi.show', Crypt::encrypt($item->id_prestasi))); ?>"class="btn btn-info btn-sm text-white" title="Detail Prestasi"aria-label="Detail Prestasi">
                                                <i class="mdi mdi-eye"></i> <spanclass="d-none d-md-inline ms-1">Detail</spanclass=>
                                            </a>
                                            <a href="<?php echo e(route('admin.prestasi.addEdit', Crypt::encrypt($item->id_prestasi))); ?>"class="btn btn-warning btn-sm text-white" title="Edit Prestasi"aria-label="Edit Prestasi">
                                                <i class="mdi mdi-pencil"></i> <spanclass="d-none d-md-inline ms-1">Edit</spanclass=>
                                            </a>
                                            <form action="<?php echo e(route('admin.prestasi.delete', Crypt::encrypt($item->id_prestasi))); ?>"
                                                method="POST" class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus Prestasi"
                                                    aria-label="Hapus Prestasi">
                                                    <i class="mdi mdi-delete"></i> <span
                                                        class="d-none d-md-inline ms-1">Hapus</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-4">
                                        Belum ada data prestasi.
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\website_sekolah\resources\views/admin/prestasi/index.blade.php ENDPATH**/ ?>