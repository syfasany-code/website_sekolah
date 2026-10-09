<?php $__env->startSection('title', 'Login Admin - ' . ($profil->nama_sekolah ?? 'SMAN 1 YOGYAKARTA')); ?>

<?php $__env->startSection('content'); ?>

<div class="login-card text-center p-4 shadow-lg rounded-4 bg-white mx-auto" style="max-width: 420px;">

    <!-- WADAH LOGO PROPORSIONAL -->
    <div class="logo-wrapper mx-auto mb-3 d-flex align-items-center justify-content-center"
         style="width: 100px; height: 100px; overflow: hidden;">
        <?php if(!empty($profil->logo) && Storage::disk('public')->exists('sekolah/' . $profil->logo)): ?>
            <img src="<?php echo e(asset('storage/sekolah/' . $profil->logo)); ?>"
                 alt="Logo <?php echo e($profil->nama_sekolah ?? 'Sekolah'); ?>"
                 class="img-fluid h-100 w-100" style="object-fit: contain;">
        <?php elseif(!empty($profil->logo) && Storage::disk('public')->exists($profil->logo)): ?>
            <img src="<?php echo e(asset('storage/' . $profil->logo)); ?>"
                 alt="Logo <?php echo e($profil->nama_sekolah ?? 'Sekolah'); ?>"
                 class="img-fluid h-100 w-100" style="object-fit: contain;">
        <?php elseif(file_exists(public_path('images/sman1.png'))): ?>
            <img src="<?php echo e(asset('images/sman1.png')); ?>"
                 alt="Logo Sekolah"
                 class="img-fluid h-100 w-100" style="object-fit: contain;">
        <?php else: ?>
            <i class="fas fa-graduation-cap fa-3x text-warning"></i>
        <?php endif; ?>
    </div>

    <!-- NAMA SEKOLAH & SUBTITLE -->
    <h4 class="login-title mb-1 fw-bold text-uppercase text-dark" style="font-size: 1.25rem;">
        <?php echo e($profil->nama_sekolah ?? 'SMAN 1 YOGYAKARTA'); ?>

    </h4>
    <p class="text-muted small mb-4">Silakan login untuk melanjutkan</p>

    <!-- ALERT ERROR (JIKA LOGIN GAGAL) -->
    <?php if(session('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show text-start small py-2 px-3 mb-3" role="alert">
            <i class="fas fa-exclamation-circle me-1"></i> <?php echo e(session('error')); ?>

            <button type="button" class="btn-close py-2" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- FORM LOGIN -->
    <form method="POST" action="<?php echo e(route('proses.login')); ?>">
        <?php echo csrf_field(); ?>

        <div class="mb-3 text-start">
            <label class="form-label small fw-semibold text-secondary">Username</label>
            <input type="text" name="username" class="form-control <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('username')); ?>" placeholder="Masukkan username" required autofocus>
            <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback small"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-3 text-start">
            <label class="form-label small fw-semibold text-secondary">Password</label>
            <input type="password" name="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Masukkan password" required>
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback small"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <button type="submit" class="btn btn-navy btn-login w-100 mt-2 py-2 fw-bold">
            Login
        </button>
    </form>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\website_sekolah\resources\views/admin/login.blade.php ENDPATH**/ ?>