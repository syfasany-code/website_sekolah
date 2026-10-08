<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'SMA Negeri 1 Yogyakarta'); ?></title>

    <!-- 1. Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- 2. FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- 3. Swiper CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('swiper/swiper-bundle.min.css')); ?>">

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

    <!-- Header / Topbar (Jika ada) -->
    <div class="top-header">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex gap-4">
                <span><i class="fas fa-phone me-2 text-warning"></i> (0274) 513454</span>
                <span class="d-none d-md-inline"><i class="fas fa-envelope me-2 text-warning"></i> humas@sman1yogya.sch.id</span>
                <span class="d-none d-lg-inline"><i class="fas fa-map-marker-alt me-2 text-warning"></i> Wirobrajan, Kota Yogyakarta</span>
            </div>
            <div class="d-flex align-items-center gap-3">
                <span class="badge bg-warning text-dark font-weight-bold">IDN</span>
                <a href="#kontak" class="btn btn-sm btn-outline-light py-0 px-2" style="font-size: 0.75rem;">Layanan Kontak</a>
            </div>
        </div>
    </div>

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
    <script src="<?php echo e(asset('swiper/swiper-bundle.min.js')); ?>"></script>

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