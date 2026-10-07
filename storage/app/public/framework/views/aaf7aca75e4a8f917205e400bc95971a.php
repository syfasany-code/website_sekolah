<?php $__env->startSection('title', !empty($guru) ? 'Edit Guru' : 'Tambah Guru'); ?>

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-lg-8 grid-margin stretch-card">
        <div class="card border-0 shadow-sm rounded-lg">

            <!-- HEADER -->
            <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <a href="<?php echo e(route('admin.guru.index')); ?>" class="btn btn-icon btn-light btn-sm mr-3" title="Kembali">
                        <i class="mdi mdi-arrow-left"></i>
                    </a>
                    <h5 class="mb-0 font-weight-bold text-dark">
                        <?php echo e(!empty($guru) ? 'Form Edit Data Guru' : 'Form Tambah Data Guru Baru'); ?>

                    </h5>
                </div>
                <span class="badge <?php echo e(!empty($guru) ? 'badge-warning text-dark' : 'badge-primary'); ?> px-3 py-2">
                    <?php echo e(!empty($guru) ? 'Mode Edit' : 'Mode Tambah'); ?>

                </span>
            </div>

            <!-- FORM BODY -->
            <form action="<?php echo e(route('admin.guru.save', !empty($guru) ? Crypt::encrypt($guru->id_guru) : null)); ?>" method="POST" enctype="multipart/form-data" class="forms-sample">
                <?php echo csrf_field(); ?>

                <?php if(!empty($guru)): ?>
                    <input type="hidden" name="id_guru" value="<?php echo e($guru->id_guru); ?>">
                <?php endif; ?>

                <div class="card-body p-4">

                    <!-- NAMA GURU -->
                    <div class="form-group mb-4">
                        <label for="nama_guru" class="font-weight-semibold text-dark mb-1">
                            Nama Guru <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light border-right-0"><i class="mdi mdi-account-outline text-muted"></i></span>
                            </div>
                            <input type="text" class="form-control <?php $__errorArgs = ['nama_guru'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nama_guru" name="nama_guru" value="<?php echo e(old('nama_guru', $guru->nama_guru ?? '')); ?>" placeholder="Contoh: Budi Santoso, S.Pd." required>
                        </div>
                        <?php $__errorArgs = ['nama_guru'];
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

                    <!-- NIP -->
                    <div class="form-group mb-4">
                        <label for="nip" class="font-weight-semibold text-dark mb-1">
                            NIP <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light border-right-0"><i class="mdi mdi-card-account-details-outline text-muted"></i></span>
                            </div>
                            <input type="text" class="form-control <?php $__errorArgs = ['nip'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nip" name="nip" value="<?php echo e(old('nip', $guru->nip ?? '')); ?>" placeholder="Contoh: 1987654321" required>
                        </div>
                        <?php $__errorArgs = ['nip'];
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

                    <!-- MATA PELAJARAN -->
                    <div class="form-group mb-4">
                        <label for="mapel" class="font-weight-semibold text-dark mb-1">
                            Mata Pelajaran <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light border-right-0"><i class="mdi mdi-book-open-page-variant text-muted"></i></span>
                            </div>
                            <input type="text" class="form-control <?php $__errorArgs = ['mapel'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="mapel" name="mapel" value="<?php echo e(old('mapel', $guru->mapel ?? '')); ?>" placeholder="Contoh: Matematika" required>
                        </div>
                        <?php $__errorArgs = ['mapel'];
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

                    <!-- FOTO GURU -->
                    <div class="form-group mb-2">
                        <label for="foto" class="font-weight-semibold text-dark mb-1">Foto Guru</label>
                        <div class="custom-file mb-2">
                            <input type="file" class="custom-file-input <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="foto" name="foto" accept="image/*" onchange="previewImage(this)">
                            <label class="custom-file-label text-muted" for="foto">Pilih file foto...</label>
                        </div>
                        <small class="text-muted d-block mb-2">Format: JPG, JPEG, PNG (Maks: 2MB). <?php echo e(!empty($guru) ? 'Biarkan kosong jika tidak diubah.' : ''); ?></small>

                        <?php $__errorArgs = ['foto'];
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
                    <a href="<?php echo e(route('admin.guru.index')); ?>" class="btn btn-light font-weight-medium">
                        <i class="mdi mdi-arrow-left mr-1"></i> Batal
                    </a>
                    <button type="submit" class="btn <?php echo e(!empty($guru) ? 'btn-warning text-dark' : 'btn-primary'); ?> font-weight-semibold shadow-sm">
                        <i class="mdi mdi-content-save-outline mr-1"></i> <?php echo e(!empty($guru) ? 'Simpan Perubahan' : 'Simpan Data Guru'); ?>

                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\website_sekolah\resources\views/admin/guru/form.blade.php ENDPATH**/ ?>