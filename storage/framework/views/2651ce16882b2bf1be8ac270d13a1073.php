<nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
    <div class="container">
        <!-- Logo & Nama Sekolah Dinamis dari Database -->
        <a class="navbar-brand d-flex align-items-center gap-3" href="<?php echo e(url('/')); ?>">
            <div class="logo-wrapper d-flex align-items-center justify-content-center bg-white rounded-circle p-1 shadow-sm"
                style="width: 50px; height: 50px; overflow: hidden; flex-shrink: 0;">
                <?php if(!empty($profil->logo) && Storage::disk('public')->exists('sekolah/' . $profil->logo)): ?>
                    <img src="<?php echo e(asset('storage/sekolah/' . $profil->logo)); ?>" alt="Logo <?php echo e($profil->nama_sekolah ?? 'Sekolah'); ?>"
                        class="w-100 h-100 object-fit-contain p-1">
                <?php elseif(!empty($profil->logo) && Storage::disk('public')->exists($profil->logo)): ?>
                    <img src="<?php echo e(asset('storage/' . $profil->logo)); ?>" alt="Logo <?php echo e($profil->nama_sekolah ?? 'Sekolah'); ?>"
                        class="w-100 h-100 object-fit-contain p-1">
                <?php elseif(!empty($profil->logo) && file_exists(public_path('images/' . $profil->logo))): ?>
                    <img src="<?php echo e(asset('images/' . $profil->logo)); ?>" alt="Logo <?php echo e($profil->nama_sekolah ?? 'Sekolah'); ?>"
                        class="w-100 h-100 object-fit-contain p-1">
                <?php else: ?>
                    <i class="fas fa-graduation-cap fa-lg text-warning"></i>
                <?php endif; ?>
            </div>

            <div>
                <h5 class="fw-bold mb-0 text-white text-uppercase" style="letter-spacing: 0.5px; font-size: 1.1rem; line-height: 1.2;">
                    <?php echo e($profil->nama_sekolah ?? 'SMAN 1 YOGYAKARTA'); ?>

                </h5>
                <small class="text-warning fw-semibold tracking-wider d-block" style="font-size: 0.72rem;">
                    TELADAN JAYAMAHE
                </small>
            </div>
        </a>

        <!-- Toggle Button untuk Layar Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu Navigasi Dinamis -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('/') && !request()->has('page') ? 'active' : ''); ?>" href="<?php echo e(url('/')); ?>#beranda">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(url('/')); ?>#profil">Profil</a>
                </li>
                <!-- Diarahkan ke section #berita di landing page terlebih dahulu -->
                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('berita*') ? 'active' : ''); ?>" href="<?php echo e(url('/')); ?>#berita">Berita & Informasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('prestasi*') ? 'active' : ''); ?>" href="<?php echo e(url('/')); ?>#prestasi">Prestasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('ekstrakurikuler*') ? 'active' : ''); ?>" href="<?php echo e(url('/')); ?>#ekstrakurikuler">Ekstrakurikuler</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(url('/')); ?>#guru">Guru & Staf</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(url('/')); ?>#siswa">Siswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('galeri*') ? 'active' : ''); ?>" href="<?php echo e(url('/')); ?>#galeri">Galeri</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php $__env->startPush('scripts'); ?>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const navLinks = document.querySelectorAll('.navbar-nav .nav-link');

        window.addEventListener('scroll', function () {
            let scrollPos = window.scrollY + 150;

            navLinks.forEach(link => {
                let href = link.getAttribute('href');

                if (href && href.includes('#')) {
                    let targetId = href.substring(href.indexOf('#'));

                    if (targetId.length > 1) {
                        let targetSection = document.querySelector(targetId);

                        if (targetSection) {
                            let sectionTop = targetSection.offsetTop;
                            let sectionHeight = targetSection.offsetHeight;

                            if (scrollPos >= sectionTop && scrollPos < (sectionTop + sectionHeight)) {
                                navLinks.forEach(l => l.classList.remove('active'));
                                link.classList.add('active');
                            }
                        }
                    }
                }
            });
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\website_sekolah\resources\views/public/layouts/navbar.blade.php ENDPATH**/ ?>