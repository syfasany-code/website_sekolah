<?php
    use Illuminate\Support\Facades\Crypt;
?>



<?php $__env->startSection('title', !empty($berita) ? 'Edit Berita' : 'Tambah Berita'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card border-0 shadow-sm rounded-lg">

                <!-- HEADER -->
                <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 font-weight-bold text-dark">
                            <?php echo e(!empty($berita) ? 'Form Edit Berita' : 'Form Tambah Berita Baru'); ?>

                        </h5>
                    </div>
                    <span class="badge <?php echo e(!empty($berita) ? 'badge-warning text-dark' : 'badge-primary'); ?> px-3 py-2">
                        <?php echo e(!empty($berita) ? 'Mode Edit' : 'Mode Tambah'); ?>

                    </span>
                </div>

                <!-- FORM BODY -->
                <form action="<?php echo e(route('admin.berita.save', !empty($berita) ? Crypt::encrypt($berita->id_berita) : null)); ?>"
                    method="POST" enctype="multipart/form-data" class="forms-sample">
                    <?php echo csrf_field(); ?>

                    <div class="card-body p-4">

                        <!-- ALERT DARI SERVER / VALIDASI (JIKA GAGAL) -->
                        <?php if(session('error')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="mdi mdi-alert-circle mr-1"></i> <?php echo e(session('error')); ?>

                            </div>
                        <?php endif; ?>

                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul class="mb-0 pl-3">
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <!-- JUDUL BERITA -->
                        <div class="form-group mb-4">
                            <label for="judul" class="font-weight-semibold text-dark mb-1">
                                Judul Berita <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right-0"><i
                                            class="mdi mdi-newspaper text-muted"></i></span>
                                </div>
                                <input type="text" class="form-control <?php $__errorArgs = ['judul'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="judul" name="judul" value="<?php echo e(old('judul', $berita->judul ?? '')); ?>"
                                    placeholder="Masukkan judul berita" required>
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

                        <!-- TANGGAL & STATUS PUBLIS (DISANDINGKAN DALAM 1 ROW) -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label for="tanggal" class="font-weight-semibold text-dark mb-1">
                                        Tanggal Publis <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light border-right-0"><i
                                                    class="mdi mdi-calendar text-muted"></i></span>
                                        </div>
                                        <input type="date" class="form-control <?php $__errorArgs = ['tanggal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="tanggal" name="tanggal"
                                            value="<?php echo e(old('tanggal', $berita->tanggal ?? date('Y-m-d'))); ?>" required>
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
                            </div>

                            <div class="col-md-6">
                                <!-- STATUS BERITA (DRAF / PUBLIS) -->
                                <div class="form-group mb-4">
                                    <label for="status" class="font-weight-semibold text-dark mb-1">
                                        Status Publikasi <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light border-right-0"><i
                                                    class="mdi mdi-eye-outline text-muted"></i></span>
                                        </div>
                                        <select class="form-control <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="status"
                                            name="status" required>
                                            <option value="publis"
                                                <?php echo e(old('status', $berita->status ?? 'publis') == 'publis' ? 'selected' : ''); ?>>
                                                Publis (Tampilkan)
                                            </option>
                                            <option value="draf"
                                                <?php echo e(old('status', $berita->status ?? '') == 'draf' ? 'selected' : ''); ?>>
                                                Draf (Sembunyikan)
                                            </option>
                                        </select>
                                    </div>
                                    <?php $__errorArgs = ['status'];
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
                            </div>
                        </div>

                        <!-- ISI BERITA -->
                        <div class="form-group mb-4">
                            <label for="isi" class="font-weight-semibold text-dark mb-1">
                                Isi Berita <span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control <?php $__errorArgs = ['isi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="isi" name="isi" rows="6"
                                placeholder="Tuliskan isi berita selengkapnya..." required><?php echo e(old('isi', $berita->isi ?? '')); ?></textarea>
                            <?php $__errorArgs = ['isi'];
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

                        <!-- GAMBAR BERITA -->
                        <div class="form-group mb-2">
                            <label for="gambar" class="font-weight-semibold text-dark mb-1">Gambar / Cover Berita</label>
                            <div class="custom-file mb-2">
                                <input type="file" class="custom-file-input <?php $__errorArgs = ['gambar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="gambar" name="gambar" accept="image/*" onchange="previewImage(this)">
                                <label class="custom-file-label text-muted" for="gambar">Pilih gambar berita...</label>
                            </div>
                            <small class="text-muted d-block mb-2">Format: JPG, JPEG, PNG (Maks: 2MB).
                                <?php echo e(!empty($berita) ? 'Biarkan kosong jika tidak diubah.' : ''); ?></small>

                            <?php $__errorArgs = ['gambar'];
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
                    <div
                        class="card-footer bg-light border-top py-3 px-4 d-flex justify-content-between align-items-center">
                        <a href="<?php echo e(route('admin.berita.index')); ?>" class="btn btn-light font-weight-medium">
                            <i class="mdi mdi-arrow-left mr-1"></i> Batal
                        </a>
                        <button type="submit"
                            class="btn <?php echo e(!empty($berita) ? 'btn-warning text-dark' : 'btn-primary'); ?> font-weight-semibold shadow-sm">
                            <i class="mdi mdi-content-save-outline mr-1"></i>
                            <?php echo e(!empty($berita) ? 'Simpan Perubahan' : 'Simpan Berita'); ?>

                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\website_sekolah\resources\views/admin/berita/form.blade.php ENDPATH**/ ?>