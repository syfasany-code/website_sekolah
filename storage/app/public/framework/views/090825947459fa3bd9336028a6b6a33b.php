<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?php echo e(isset($prestasi) ? 'Edit Data Prestasi' : 'Tambah Data Prestasi'); ?></h4>

                <form action="<?php echo e(isset($prestasi) ? route('admin.prestasi.addEdit', $prestasi->id_prestasi) : route('admin.prestasi.save')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php if(isset($prestasi)): ?>
                        <?php echo method_field('PUT'); ?>
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="judul">Judul Prestasi / Lomba <span class="text-danger">*</span></label>
                        <input type="text" name="judul" class="form-control <?php $__errorArgs = ['judul'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="judul" value="<?php echo e(old('judul', $prestasi->judul ?? '')); ?>" required placeholder="Contoh: Juara 1 Olimpiade Matematika">
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

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_peraih">Nama Peraih / Tim <span class="text-danger">*</span></label>
                                <input type="text" name="nama_peraih" class="form-control <?php $__errorArgs = ['nama_peraih'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nama_peraih" value="<?php echo e(old('nama_peraih', $prestasi->nama_peraih ?? '')); ?>" required placeholder="Nama Siswa / Tim">
                                <?php $__errorArgs = ['nama_peraih'];
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
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kategori">Kategori <span class="text-danger">*</span></label>
                                <select name="kategori" class="form-control <?php $__errorArgs = ['kategori'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="kategori" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="Akademik" <?php echo e(old('kategori', $prestasi->kategori ?? '') == 'Akademik' ? 'selected' : ''); ?>>Akademik</option>
                                    <option value="Non-Akademik" <?php echo e(old('kategori', $prestasi->kategori ?? '') == 'Non-Akademik' ? 'selected' : ''); ?>>Non-Akademik</option>
                                    <option value="Seni & Budaya" <?php echo e(old('kategori', $prestasi->kategori ?? '') == 'Seni & Budaya' ? 'selected' : ''); ?>>Seni & Budaya</option>
                                    <option value="Olahraga" <?php echo e(old('kategori', $prestasi->kategori ?? '') == 'Olahraga' ? 'selected' : ''); ?>>Olahraga</option>
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
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tingkat">Tingkat <span class="text-danger">*</span></label>
                                <select name="tingkat" class="form-control <?php $__errorArgs = ['tingkat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="tingkat" required>
                                    <option value="">-- Pilih Tingkat --</option>
                                    <option value="Kota/Kabupaten" <?php echo e(old('tingkat', $prestasi->tingkat ?? '') == 'Kota/Kabupaten' ? 'selected' : ''); ?>>Kota/Kabupaten</option>
                                    <option value="Provinsi" <?php echo e(old('tingkat', $prestasi->tingkat ?? '') == 'Provinsi' ? 'selected' : ''); ?>>Provinsi</option>
                                    <option value="Nasional" <?php echo e(old('tingkat', $prestasi->tingkat ?? '') == 'Nasional' ? 'selected' : ''); ?>>Nasional</option>
                                    <option value="Internasional" <?php echo e(old('tingkat', $prestasi->tingkat ?? '') == 'Internasional' ? 'selected' : ''); ?>>Internasional</option>
                                </select>
                                <?php $__errorArgs = ['tingkat'];
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
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="juara">Capaian / Juara <span class="text-danger">*</span></label>
                                <input type="text" name="juara" class="form-control <?php $__errorArgs = ['juara'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="juara" value="<?php echo e(old('juara', $prestasi->juara ?? '')); ?>" required placeholder="Contoh: Juara 1 / Medali Emas">
                                <?php $__errorArgs = ['juara'];
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
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tanggal">Tanggal Peroleh <span class="text-danger">*</span></label>
                                <input type="date" name="tanggal" class="form-control <?php $__errorArgs = ['tanggal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="tanggal" value="<?php echo e(old('tanggal', $prestasi->tanggal ?? '')); ?>" required>
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
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi / Catatan</label>
                        <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4" placeholder="Keterangan singkat mengenai kompetisi/prestasi..."><?php echo e(old('deskripsi', $prestasi->deskripsi ?? '')); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="foto">Foto Documentation / Piagam</label>
                        <?php if(isset($prestasi) && $prestasi->foto): ?>
                            <div class="mb-2">
                                <img src="<?php echo e(asset('storage/' . $prestasi->foto)); ?>" alt="Foto Prestasi" style="max-height: 120px; border-radius: 6px;">
                            </div>
                        <?php endif; ?>
                        <input type="file" name="foto" class="form-control-file <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="foto">
                        <small class="form-text text-muted">Format: JPG, JPEG, PNG (Maks: 2MB)</small>
                        <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger mt-1" style="font-size: 80%;"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                    <a href="<?php echo e(route('admin.prestasi.index')); ?>" class="btn btn-light">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\website_sekolah\resources\views/admin/prestasi/form.blade.php ENDPATH**/ ?>