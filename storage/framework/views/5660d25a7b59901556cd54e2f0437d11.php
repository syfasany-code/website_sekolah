<?php $__env->startSection('content'); ?>
<div style="padding: 20px; font-family: sans-serif; color: #333;">

    <?php if(session('success')): ?>
        <div style="background-color: #d1e7dd; color: #0f5132; padding: 12px 20px; border-radius: 8px; margin-bottom: 20px;">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <!-- Header Banner Profil -->
    <div style="background: #1e293b; color: #ffffff; padding: 25px; border-radius: 12px; margin-bottom: 25px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px;">
        <div style="display: flex; align-items: center; gap: 20px; flex-wrap: wrap;">
            <!-- Logo Sekolah -->
            <?php if($profil && $profil->logo && Storage::disk('public')->exists($profil->logo)): ?>
                <div style="background: #ffffff; padding: 8px; border-radius: 50%; width: 80px; height: 80px; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 8px rgba(0,0,0,0.15);">
                    <img src="<?php echo e(asset('storage/' . $profil->logo)); ?>" alt="Logo" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                </div>
            <?php endif; ?>

            <!-- Detail Utama -->
            <div>
                <h2 style="margin: 0 0 10px 0; font-size: 24px; font-weight: bold; color: #ffffff;">
                    <?php echo e($profil->nama_sekolah ?? 'SMAN 1 Yogyakarta'); ?>

                </h2>
                <div style="display: flex; gap: 10px; flex-wrap: wrap; margin-bottom: 8px;">
                    <span style="background: #2563eb; color: #ffffff; padding: 4px 12px; border-radius: 20px; font-size: 13px; font-weight: 500;">
                        NPSN: <?php echo e($profil->npsn ?? '-'); ?>

                    </span>
                    <span style="background: #475569; color: #ffffff; padding: 4px 12px; border-radius: 20px; font-size: 13px; font-weight: 500;">
                        Tahun Berdiri: <?php echo e($profil->tahun_berdiri ?? '-'); ?>

                    </span>
                    <span style="background: #0d9488; color: #ffffff; padding: 4px 12px; border-radius: 20px; font-size: 13px; font-weight: 500;">
                        Kontak: <?php echo e($profil->kontak ?? '-'); ?>

                    </span>
                </div>
                <p style="margin: 0; color: #cbd5e1; font-size: 14px;">
                    Kepala Sekolah: <strong style="color: #ffffff;"><?php echo e($profil->kepala_sekolah ?? '-'); ?></strong>
                </p>
            </div>
        </div>

        <!-- Tombol Edit Profil -->
        <div>
            <a href="<?php echo e(route('admin.profil.edit')); ?>" style="background: #ffffff; color: #2563eb; text-decoration: none; padding: 10px 20px; border-radius: 8px; font-weight: bold; display: inline-block; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                Edit Profil
            </a>
        </div>
    </div>

    <!-- Foto Banner Gedung Sekolah -->
    <?php if($profil && $profil->foto && Storage::disk('public')->exists($profil->foto)): ?>
    <div style="margin-bottom: 25px; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
        <img src="<?php echo e(asset('storage/' . $profil->foto)); ?>" style="width: 100%; max-height: 250px; object-fit: cover; display: block;" alt="Gedung Sekolah">
    </div>
    <?php endif; ?>

    <!-- Content Grid -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 20px;">

        <!-- Card Visi & Misi -->
        <div style="background: #ffffff; padding: 25px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 2px 8px rgba(0,0,0,0.04);">
            <h3 style="margin-top: 0; margin-bottom: 15px; color: #0f172a; border-bottom: 2px solid #2563eb; padding-bottom: 10px; font-size: 18px;">
                Visi & Misi Sekolah
            </h3>
            <div style="color: #334155; line-height: 1.8; font-size: 14px; white-space: pre-line; text-align: justify;">
                <?php echo e($profil->visi_misi ?? 'Visi & Misi belum diisi.'); ?>

            </div>
        </div>

        <!-- Card Deskripsi & Alamat -->
        <div style="background: #ffffff; padding: 25px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 2px 8px rgba(0,0,0,0.04);">
            <h3 style="margin-top: 0; margin-bottom: 15px; color: #0f172a; border-bottom: 2px solid #0d9488; padding-bottom: 10px; font-size: 18px;">
                Deskripsi & Ringkasan
            </h3>
            <p style="color: #334155; line-height: 1.8; font-size: 14px; margin-bottom: 25px; text-align: justify;">
                <?php echo e($profil->deskripsi ?? 'Deskripsi belum diisi.'); ?>

            </p>

            <h3 style="margin-top: 0; margin-bottom: 15px; color: #0f172a; border-bottom: 2px solid #16a34a; padding-bottom: 10px; font-size: 18px;">
                Alamat Lengkap
            </h3>
            <p style="color: #334155; line-height: 1.8; font-size: 14px; margin: 0;">
                <?php echo e($profil->alamat ?? 'Alamat belum diisi.'); ?>

            </p>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\website_sekolah\resources\views/admin/profil-sekolah/profil.blade.php ENDPATH**/ ?>