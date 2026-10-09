 

<?php $__env->startSection('content'); ?>
<div class="container-fluid py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h4 class="card-title mb-0">Detail Pengguna</h4>
            <a href="<?php echo e(route('admin.user.index')); ?>" class="btn btn-sm btn-secondary">Kembali</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <tr>
                    <th width="200">ID Pengguna</th>
                    <td><?php echo e($user->id); ?></td>
                </tr>
                <tr>
                    <th>Nama Lengkap</th>
                    <td><?php echo e($user->name); ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo e($user->email); ?></td>
                </tr>
                <tr>
                    <th>Role</th>
                    <td>
                        <span class="badge <?php echo e($user->role === 'admin' ? 'bg-danger' : 'bg-info'); ?>">
                            <?php echo e(ucfirst($user->role)); ?>

                        </span>
                    </td>
                </tr>
                <tr>
                    <th>Dibuat Pada</th>
                    <td><?php echo e($user->created_at ? $user->created_at->format('d M Y H:i') : '-'); ?></td>
                </tr>
                <tr>
                    <th>Diperbarui Pada</th>
                    <td><?php echo e($user->updated_at ? $user->updated_at->format('d M Y H:i') : '-'); ?></td>
                </tr>
            </table>

            <div class="mt-3">
                <a href="<?php echo e(route('admin.user.addEdit', $user->id)); ?>" class="btn btn-warning">Edit Pengguna</a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\website_sekolah\resources\views/admin/user/show.blade.php ENDPATH**/ ?>