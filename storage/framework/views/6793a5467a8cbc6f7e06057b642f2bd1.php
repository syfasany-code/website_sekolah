<?php $__env->startSection('title', !empty($galeri) ? 'Edit Galeri' : 'Tambah Galeri'); ?>

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-lg-8 grid-margin stretch-card">
        <div class="card border-0 shadow-sm rounded-lg">

            <!-- HEADER -->
            <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <a href="<?php echo e(route('admin.galeri.index')); ?>" class="btn btn-icon btn-light btn-sm mr-3" title="Kembali">
                        <i class="mdi mdi-arrow-left"></i>
                    </a>
                    <h5 class="mb-0 font-weight-bold text-dark">
                        <?php echo e(!empty($galeri) ? 'Form Edit Galeri' : 'Form Tambah Galeri Baru'); ?>

                    </h5>
                </div>
                <span class="badge <?php echo e(!empty($galeri) ? 'badge-warning text-dark' : 'badge-primary'); ?> px-3 py-2">
                    <?php echo e(!empty($galeri) ? 'Mode Edit' : 'Mode Tambah'); ?>

                </span>
            </div>

            <!-- FORM BODY -->
            <form action="<?php echo e(route('admin.galeri.save')); ?>" method="POST" enctype="multipart/form-data" class="forms-sample">
                <?php echo csrf_field(); ?>

                
                <?php if(!empty($galeri)): ?>
                    <input type="hidden" name="id" value="<?php echo e($galeri->id_galeri); ?>">
                <?php endif; ?>

                <div class="card-body p-4">

                    <!-- JUDUL -->
                    <div class="form-group mb-4">
                        <label for="judul" class="font-weight-semibold text-dark mb-1">
                            Judul Galeri <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light border-right-0"><i class="mdi mdi-format-title text-muted"></i></span>
                            </div>
                            <input type="text" class="form-control <?php $__errorArgs = ['judul'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="judul" name="judul" value="<?php echo e(old('judul', $galeri->judul ?? '')); ?>" placeholder="Masukkan judul kegiatan atau galeri" required>
                        </div>
                        <?php $__errorArgs = ['judul'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small class="text-danger mt-1 d-block"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- TANGGAL -->
                    <div class="form-group mb-4">
                        <label for="tanggal" class="font-weight-semibold text-dark mb-1">
                            Tanggal <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light border-right-0"><i class="mdi mdi-calendar text-muted"></i></span>
                            </div>
                            <input type="date" class="form-control <?php $__errorArgs = ['tanggal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="tanggal" name="tanggal" value="<?php echo e(old('tanggal', $galeri->tanggal ?? date('Y-m-d'))); ?>" required>
                        </div>
                        <?php $__errorArgs = ['tanggal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small class="text-danger mt-1 d-block"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- KETERANGAN -->
                    <div class="form-group mb-4">
                        <label for="keterangan" class="font-weight-semibold text-dark mb-1">Keterangan / Deskripsi</label>
                        <textarea class="form-control <?php $__errorArgs = ['keterangan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="keterangan" name="keterangan" rows="4" placeholder="Tuliskan keterangan singkat mengenai gambar/kegiatan ini..."><?php echo e(old('keterangan', $galeri->keterangan ?? '')); ?></textarea>
                        <?php $__errorArgs = ['keterangan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small class="text-danger mt-1 d-block"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- GAMBAR / FILE -->
                    <div class="form-group mb-2">
                        <label for="file" class="font-weight-semibold text-dark mb-1">File Gambar</label>
                        <div class="custom-file mb-2">
                            <input type="file" class="custom-file-input <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="file" name="file" accept="image/*" onchange="previewImage(this)">
                            <label class="custom-file-label text-muted" for="file">Pilih gambar...</label>
                        </div>
                        <small class="text-muted d-block mb-2">Format: JPG, JPEG, PNG (Maks: 2MB). <?php echo e(!empty($galeri) ? 'Biarkan kosong jika tidak ingin mengubah gambar.' : ''); ?></small>

                        <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small class="text-danger d-block mb-2"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                </div>

                <!-- FOOTER / BUTTONS -->
                <div class="card-footer bg-light border-top py-3 px-4 d-flex justify-content-between align-items-center">
                    <a href="<?php echo e(route('admin.galeri.index')); ?>" class="btn btn-light font-weight-medium">
                        <i class="mdi mdi-arrow-left mr-1"></i> Batal
                    </a>
                    <button type="submit" class="btn <?php echo e(!empty($galeri) ? 'btn-warning text-dark' : 'btn-primary'); ?> font-weight-semibold shadow-sm">
                        <i class="mdi mdi-content-save-outline mr-1"></i> <?php echo e(!empty($galeri) ? 'Simpan Perubahan' : 'Simpan Data'); ?>

                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\website_sekolah\resources\views/admin/galeri/form.blade.php ENDPATH**/ ?>