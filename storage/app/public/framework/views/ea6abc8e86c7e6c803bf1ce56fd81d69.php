<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="card-title mb-0" style="font-size: 1.5rem; font-weight: 600;">Data Prestasi</h3>
                    <a href="<?php echo e(route('admin.prestasi.addEdit')); ?>" class="btn btn-primary">
                        <i class="fa-solid fa-plus mr-1"></i> Tambah Prestasi
                    </a>
                </div>

                <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>

                <div class="table-responsive">
                    <table id="prestasiTable" class="table table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">No</th>
                                <th>Judul Lomba / Prestasi</th>
                                <th>Nama Peraih</th>
                                <th>Kategori</th>
                                <th>Tingkat</th>
                                <th>Juara</th>
                                <th class="text-center" style="width: 80px;">Foto</th>
                                <th class="text-center" style="width: 220px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $prestasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                <td class="font-weight-medium"><?php echo e($item->judul); ?></td>
                                <td><?php echo e($item->nama_peraih); ?></td>
                                <td>
                                    <span class="badge badge-info"><?php echo e($item->kategori); ?></span>
                                </td>
                                <td><span class="badge badge-success"><?php echo e($item->tingkat); ?></span></td>
                                <td><strong><?php echo e($item->juara); ?></strong></td>
                                <td class="text-center">
                                    <?php if($item->foto): ?>
                                        <img src="<?php echo e(asset('storage/' . $item->foto)); ?>" alt="Foto" class="img-avatar">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('images/faces/face8.jpg')); ?>" alt="Default" class="img-avatar">
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?php echo e(route('admin.prestasi.show', $item->id_prestasi)); ?>" class="btn btn-primary btn-sm px-2">
                                        <i class="fa-solid fa-eye"></i> Detail
                                    </a>
                                    <a href="<?php echo e(route('admin.prestasi.addEdit', $item->id_prestasi)); ?>" class="btn btn-warning btn-sm px-2 text-white">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </a>
                                    <form action="<?php echo e(route('admin.prestasi.delete', $item->id_prestasi)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data prestasi ini?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger btn-sm px-2">
                                            <i class="fa-solid fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\website_sekolah\resources\views/admin/prestasi/index.blade.php ENDPATH**/ ?>