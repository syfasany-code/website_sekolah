<?php $__env->startSection('title', isset($ekskul) ? 'Edit Ekskul' : 'Tambah Ekskul'); ?>

<?php $__env->startSection('content'); ?>
<div class="card p-4 shadow-sm">

    <h4><?php echo e(isset($ekskul) ? 'Edit Ekstrakurikuler' : 'Tambah Ekstrakurikuler'); ?></h4>

    <form action="<?php echo e(route('admin.ekstrakulikuler.save', isset($ekskul) ? Crypt::encrypt($ekskul->id_ekstrakulikuler) : null)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        
        <div class="mb-3">
            <label>Nama Ekskul</label>
            <input type="text" name="nama_ekskul" class="form-control"
                value="<?php echo e(old('nama_ekskul', $ekskul->nama_ekskul ?? '')); ?>" required>
        </div>

        
        <div class="mb-3">
            <label>Pembina</label>
            <input type="text" name="pembina" class="form-control"
                value="<?php echo e(old('pembina', $ekskul->pembina ?? '')); ?>" required>
        </div>

        
        <div class="mb-3">
            <label>Jadwal Latihan</label>
            <input type="text" name="jadwal_latihan" class="form-control"
                value="<?php echo e(old('jadwal_latihan', $ekskul->jadwal_latihan ?? '')); ?>" placeholder="Contoh: Senin & Rabu, 15:00" required>
        </div>

        
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4"><?php echo e(old('deskripsi', $ekskul->deskripsi ?? '')); ?></textarea>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label fw-semibold"><?php echo e(isset($ekstrakulikuler) ? 'Gant Gambar Kegiatan' : 'Foto / Gambar Kegiatan'); ?></label>
            <input type="file" class="form-control <?php $__errorArgs = ['gambar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="gambar" name="gambar" accept="image/*">
            <small class="text-muted">Format: JPG, JPEG, PNG (Maks: 2MB). <?php echo e(isset($ekskul) ? 'Biarkan kosong jika tidak diubah.' : ''); ?></small>
            <?php $__errorArgs = ['gambar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <?php if(isset($ekskul) && $ekskul->gambar && file_exists(public_path('storage/' . $ekskul->gambar))): ?>
                <div class="mt-2">
                    <small class="text-secondary d-block">Gambar saat ini:</small>
                    <img src="<?php echo e(asset('storage/' .$ekskul->gambar)); ?>" alt="<?php echo e($ekskul->nama_ekskul); ?>" class="rounded shadow-sm mt-1" style="height: 80px; object-fit: cover;">
                </div>
            <?php endif; ?>
        </div>

        <div class="mt-3 d-flex justify-content-between">
            <a href="<?php echo e(route('admin.ekstrakulikuler.index')); ?>" class="btn btn-secondary">Kembali</a>

            <button class="btn btn-primary">
                <?php echo e(isset($ekskul) ? 'Update' : 'Simpan'); ?>

            </button>
        </div>

    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\website_sekolah\resources\views/admin/ekstrakulikuler/form.blade.php ENDPATH**/ ?>