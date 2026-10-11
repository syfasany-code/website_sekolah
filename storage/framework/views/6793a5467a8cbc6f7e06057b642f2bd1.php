<?php $__env->startSection('title', !empty($galeri) ? 'Edit Galeri' : 'Tambah Galeri'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-lg-11 grid-margin stretch-card">
            <div class="card border-0 shadow-sm rounded-lg">

                <!-- HEADER -->
                <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 font-weight-bold text-dark">
                            <?php echo e(!empty($galeri) ? 'Form Edit Galeri' : 'Form Tambah Galeri Baru'); ?>

                        </h5>
                    </div>
                    <span class="badge <?php echo e(!empty($galeri) ? 'badge-warning text-dark' : 'badge-primary'); ?> px-3 py-2">
                        <?php echo e(!empty($galeri) ? 'Mode Edit' : 'Mode Tambah'); ?>

                    </span>
                </div>

                <!-- FORM BODY -->
                <div class="card-body">
                    <form action="<?php echo e(route('admin.galeri.save')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        
                        <?php if(!empty($galeri)): ?>
                            <input type="hidden" name="id" value="<?php echo e($galeri->id_galeri ?? $galeri->id); ?>">
                        <?php endif; ?>

                        
                        <div class="mb-3">
                            <label class="form-label font-weight-bold">Judul <span class="text-danger">*</span></label>
                            <input type="text" name="judul" class="form-control <?php $__errorArgs = ['judul'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   value="<?php echo e(old('judul', $galeri->judul ?? '')); ?>" required placeholder="Masukkan judul galeri">
                            <?php $__errorArgs = ['judul'];
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

                        
                        <div class="mb-3">
                            <label class="form-label font-weight-bold">Kategori <span class="text-danger">*</span></label>
                            <select name="kategori" id="kategori" class="form-select form-control <?php $__errorArgs = ['kategori'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required onchange="toggleKategoriInput()">
                                <option value="foto" <?php echo e(old('kategori', $galeri->kategori ?? 'foto') == 'foto' ? 'selected' : ''); ?>>Foto</option>
                                <option value="video" <?php echo e(old('kategori', $galeri->kategori ?? '') == 'video' ? 'selected' : ''); ?>>Video</option>
                            </select>
                            <?php $__errorArgs = ['kategori'];
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

                        
                        <div class="mb-3" id="input-foto">
                            <label class="form-label font-weight-bold">File Gambar/Foto</label>
                            <input type="file" name="file" class="form-control <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" accept="image/*">
                            <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            
                            <?php if(!empty($galeri) && $galeri->kategori === 'foto' && $galeri->file): ?>
                                <div class="mt-2">
                                    <small class="text-muted d-block mb-1">Foto Saat Ini:</small>
                                    <img src="<?php echo e(asset('storage/galeri/' . $galeri->file)); ?>" alt="Foto Galeri" width="120" class="img-thumbnail rounded">
                                </div>
                            <?php endif; ?>
                        </div>

                        
                        <div class="mb-3 d-none" id="input-video">
                            <label class="form-label font-weight-bold">Link Video (YouTube/URL)</label>
                            <input type="url" name="link" class="form-control <?php $__errorArgs = ['link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   value="<?php echo e(old('link', $galeri->link ?? '')); ?>" placeholder="https://www.youtube.com/watch?v=...">
                            <?php $__errorArgs = ['link'];
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

                        
                        <div class="mb-3">
                            <label class="form-label font-weight-bold">Keterangan <span class="text-danger">*</span></label>
                            <textarea name="keterangan" class="form-control <?php $__errorArgs = ['keterangan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                      rows="4" required placeholder="Tuliskan deskripsi atau keterangan galeri"><?php echo e(old('keterangan', $galeri->keterangan ?? '')); ?></textarea>
                            <?php $__errorArgs = ['keterangan'];
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

                        
                        <div class="mb-4">
                            <label class="form-label font-weight-bold">Tanggal <span class="text-danger">*</span></label>
                            <input type="date" name="tanggal" class="form-control <?php $__errorArgs = ['tanggal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   value="<?php echo e(old('tanggal', $galeri->tanggal ?? date('Y-m-d'))); ?>" required>
                            <?php $__errorArgs = ['tanggal'];
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

                        <!-- BUTTON ACTION -->
                        <div class="d-flex justify-content-end gap-2">
                            <a href="<?php echo e(route('admin.galeri.index')); ?>" class="btn btn-secondary mr-2">Batal</a>
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="mdi mdi-content-save"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- SCRIPT SWITCH TOGGLE INPUT -->
    <script>
        function toggleKategoriInput() {
            const kategori = document.getElementById('kategori').value;
            const inputFoto = document.getElementById('input-foto');
            const inputVideo = document.getElementById('input-video');

            if (kategori === 'video') {
                inputVideo.classList.remove('d-none');
                inputFoto.classList.add('d-none');
            } else {
                inputFoto.classList.remove('d-none');
                inputVideo.classList.add('d-none');
            }
        }

        // Jalankan script saat halaman selesai dimuat
        document.addEventListener('DOMContentLoaded', toggleKategoriInput);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\website_sekolah\resources\views/admin/galeri/form.blade.php ENDPATH**/ ?>