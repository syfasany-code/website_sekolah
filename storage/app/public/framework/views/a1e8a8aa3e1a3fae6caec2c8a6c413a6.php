 

<?php $__env->startSection('title', 'Login Admin'); ?>

<?php $__env->startSection('content'); ?>

<div class="login-card text-center">

    <img src="<?php echo e(asset('images/logo-sman1.png')); ?>" class="logo">

    <h4 class="login-title mb-3">SMAN 1 Yogyakarta</h4>
    <p class="text-muted mb-4">Silakan login untuk melanjutkan</p>

    <form method="POST" action="<?php echo e(route('proses.login')); ?>">
        <?php echo csrf_field(); ?>

        <div class="mb-3 text-start">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>

        <div class="mb-3 text-start">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-login w-100 mt-2">
            Login
        </button>
    </form>

</div>

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\website_sekolah\resources\views/admin/login.blade.php ENDPATH**/ ?>