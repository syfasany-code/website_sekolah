<?php $__env->startSection('title', 'Data Siswa - MTsN 10 Tasikmalaya'); ?>
<?php $__env->startSection('content'); ?>


<div class="card shadow-sm border-0 rounded-3">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Siswa</h5>
        <?php if(strcasecmp(auth()->user()->role, 'admin') === 0): ?>
            <a href="<?php echo e(route('admin.siswa.addEdit')); ?>" class="btn btn-primary">
                + Tambah Siswa
            </a>
        <?php endif; ?>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tahun Masuk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $siswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td class="fw-semibold"><?php echo e($item->nama_siswa); ?></td>
                        <td>
                            <span class="badge bg-info text-dark">
                                <?php echo e($item->jenis_kelamin); ?>

                            </span>
                        </td>
                        <td><?php echo e($item->tahun_masuk); ?></td>
                        <td  class="tect-center">
                            <div class="btn-aksi-group" role="group">
                                <a href="<?php echo e(route('admin.siswa.show', Crypt::encrypt($item->id_siswa))); ?>"class="btn btn-info btn-sm text-white" title="Detail Siswa"aria-label="Detail Siswa">
                                    <i class="mdi mdi-eye"></i> <spanclass="d-none d-md-inline ms-1">Detail</spanclass=>
                                </a>
                                <?php if(strcasecmp(auth()->user()->role, 'admin') === 0): ?>
                                    <a href="<?php echo e(route('admin.siswa.addEdit', $item->id)); ?>" class="btn btn-sm btn-warning">
                                        Edit
                                    </a>

                                    <form action="<?php echo e(route('admin.siswa.delete', $item->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data siswa ini?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\website_sekolah\resources\views/admin/siswa/index.blade.php ENDPATH**/ ?>