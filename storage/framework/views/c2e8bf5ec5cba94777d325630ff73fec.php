<?php $__env->startSection('title', isset($kelas) ? 'Tambah Kelas - SMA 1 Yogyakarta' : 'Tambah Kelas - SMA 1 Yogyakarta'); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid py-2">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card shadow-sm border-0 rounded-3">

                <!-- HEADER -->
                <div class="card-header bg-white py-3">
                    <h3 class="mb-0 font-weight-bold text-dark">
                        <?php echo e(isset($kelas) ? 'Tambah Data Kelas' : 'Tambah Data Kelas'); ?>

                    </h3>
                </div>

                <!-- BODY -->
                <div class="card-body p-4">

                    <!-- Form mengarah ke route 'admin.kelas.save'. Jika mode edit, menyertakan parameter encrypt ID -->
                    <form action="<?php echo e(isset($kelas->id_kelas) ? route('admin.kelas.save', Crypt::encrypt($kelas->id_kelas)) : route('admin.kelas.save')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <!-- INPUT NAMA KELAS -->
                        <div class="form-group mb-3">
                            <label for="nama_kelas" class="font-weight-semibold">Nama Kelas <span class="text-danger">*</span></label>
                            <input type="text" class="form-control <?php $__errorArgs = ['nama_kelas'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nama_kelas" name="nama_kelas" value="<?php echo e(old('nama_kelas', $kelas->nama_kelas ?? '')); ?>" placeholder="Contoh: VII A, VIII B, dll" required>

                            <?php $__errorArgs = ['nama_kelas'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- TOMBOL AKSI -->
                        <div class="d-flex justify-content-end mt-4">
                            <a href="<?php echo e(route('admin.kelas.index')); ?>" class="btn btn-secondary mr-2">Kembali</a>
                            <button type="submit" class="btn btn-primary font-weight-semibold">Simpan Data</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\website_sekolah\resources\views/admin/kelas/form.blade.php ENDPATH**/ ?>