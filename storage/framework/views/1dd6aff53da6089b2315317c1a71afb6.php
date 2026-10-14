<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'SMA Negeri 1 Yogyakarta'); ?></title>

    <!-- 1. Bootstrap 5 CSS -->
    <link href="<?php echo e(asset('dist/css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- 2. FontAwesome Icons -->
    <link rel="stylesheet" href="<?php echo e(asset('vendors/font-awesome/css/font-awesome.min.css')); ?>">

    <!-- 4. Google Fonts Premium -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- 5. AOS CSS & Custom Dashboard CSS (Wajib Ada!) -->
    <link rel="stylesheet" href="<?php echo e(asset('aos/aos.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/shared/dashboard.css')); ?>">

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>

    <!-- Include Navbar -->
    <?php echo $__env->make('public.layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Konten Dinamis -->
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- Include Footer -->
    <?php echo $__env->make('public.layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- AOS JS & Init -->
    <script src="<?php echo e(asset('aos/aos.js')); ?>"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
    </script>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH D:\website_sekolah\resources\views/public/layouts/app.blade.php ENDPATH**/ ?>