<?php $__env->startSection('title', 'SMA Negeri 1 Yogyakarta - Teladan Jayamahe'); ?>

<?php $__env->startSection('content'); ?>

    <!-- Bar Pengumuman berjalan (Ticker) -->
    <div class="ticker-bar">
        <div class="container d-flex align-items-center">
            <span class="ticker-title me-3 text-nowrap"><i class="fas fa-bullhorn me-1"></i> Pengumuman</span>
            <marquee class="fw-medium text-light" behavior="scroll" direction="left" scrollamount="6">
                • Selamat Datang di Website Resmi SMA Negeri 1 Yogyakarta (Teladan) • Penerimaan Peserta Didik Baru (PPDB) Tahun Ajaran 2024/2025 Segera dibuka.
            </marquee>
        </div>
    </div>

    <!-- Section Hero Utama -->
    <section id="beranda" class="hero-section">
        <div class="container position-relative" style="z-index: 2;">
            <div class="row align-items-center gy-5">
                <div class="col-lg-7" data-aos="fade-right" data-aos-duration="1000">
                    <span class="hero-badge"><i class="fas fa-award me-2"></i> Sekolah Penggerak & Berwawasan Global</span>
                    <h1 class="display-3 text-white mb-3">Membentuk Generasi Pemimpin Unggul & Berkarakter</h1>
                    <p class="lead text-light opacity-90 mb-4 fs-5" style="line-height: 1.8; font-weight: 400;">
                        SMA Negeri 1 Yogyakarta senantiasa mengintegrasikan kecerdasan akademis, integritas moral, dan wawasan kebangsaan berlandaskan semangat motto Teladan Jayamahe.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#profil" class="btn btn-gold btn-lg">Eksplorasi Profil Sekolah</a>
                        <a href="#prestasi" class="btn btn-outline-light btn-lg fw-bold">Daftar Prestasi Siswa</a>
                    </div>

                    <!-- Ringkasan Statistik -->
                    <div class="row g-3 mt-4 pt-3 border-top border-secondary">
                        <div class="col-4">
                            <div class="stat-card">
                                <div class="stat-number">1957</div>
                                <div class="text-light small fw-medium">Tahun Berdiri</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="stat-card">
                                <div class="stat-number">100%</div>
                                <div class="text-light small fw-medium">Akreditasi A</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="stat-card">
                                <div class="stat-number">50+</div>
                                <div class="text-light small fw-medium">Penghargaan / Thn</div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-5 text-center" data-aos="fade-left" data-aos-duration="1000">
                    <div class="position-relative d-inline-block">
                        <img src="<?php echo e(asset('images/smaaa.jpg')); ?>" alt="Gedung Sekolah" class="img-fluid rounded-4 shadow-lg border border-3 border-warning" style="max-height: 420px; object-fit: cover;">
                        <div class="bg-white text-dark p-3 rounded-3 shadow position-absolute bottom-0 start-0 m-3 text-start border-start border-4 border-warning" style="max-width: 260px;">
                            <i class="fas fa-quote-left text-warning mb-1 fs-5"></i>
                            <p class="small mb-0 fw-semibold fs-6" style="font-family: var(--font-heading); font-style: italic;">"Berjaya di mana pun dan kapan pun."</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sambutan Kepala Sekolah -->
    <section id="profil" class="principal-section">
        <div class="container">
            <div class="row align-items-center gy-4">
                <div class="col-lg-5" data-aos="fade-right" data-aos-duration="800">
                    <div class="principal-img-container">
                        <img src="<?php echo e(asset('images/kepalasekolah.jpg')); ?>" alt="Kepala Sekolah" class="img-fluid w-100" style="height: 480px; object-fit: cover;">
                        <div class="principal-info-overlay">
                            <h4 class="mb-0 text-white fw-bold" style="font-family: var(--font-heading);">Ngadiya, S.Pd., M.M.</h4>
                            <small class="text-warning fw-semibold">Kepala Sekolah SMA Negeri 1 Yogyakarta</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 ps-lg-5" data-aos="fade-left" data-aos-duration="800">
                    <span class="section-tag">Sambutan Pimpinan</span>
                    <h2 class="section-title">Selamat Datang di SMA Negeri 1 Yogyakarta</h2>
                    <div class="section-divider"></div>

                    <div class="text-muted leading-relaxed fs-6">
                        <p>Puji dan syukur kita panjatkan ke hadirat Allah SWT. SMA Negeri 1 Yogyakarta terus berkomitmen menjadi wadah pembelajaran berkualitas tinggi yang siap mendidik siswa menjadi pribadi berintegritas dan siap bersaing di ranah global.</p>
                    </div>

                    <div class="mt-4 pt-2">
                        <button class="btn btn-outline-navy me-2" data-bs-toggle="modal" data-bs-target="#modalVisiMisi">
                            <i class="fas fa-bullseye me-2"></i>Lihat Visi & Misi
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Berita Terbaru -->
    <section id="berita" class="py-5">
        <div class="container py-4">
            <div class="d-flex flex-wrap justify-content-between align-items-end mb-4" data-aos="fade-up">
                <div>
                    <span class="section-tag">Kabar Sekolah</span>
                    <h2 class="section-title mb-0">Berita & Informasi Terbaru</h2>
                </div>
                <a href="#" class="btn btn-outline-navy mt-3 mt-md-0">Lihat Semua Berita <i class="fas fa-arrow-right ms-2"></i></a>
            </div>
            <div class="section-divider" data-aos="fade-up"></div>

            <div class="row g-4">
                <?php $__empty_1 = true; $__currentLoopData = $beritas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?php echo e($loop->index * 100); ?>">
                        <div class="custom-card">
                            <?php if($item->gambar): ?>
                                <img src="<?php echo e(asset('storage/berita/' . $item->gambar)); ?>" class="card-img-top" alt="<?php echo e($item->judul); ?>" style="height: 200px; object-fit: cover;">
                            <?php else: ?>
                                <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=600&auto=format&fit=crop" class="card-img-top" alt="Default Berita" style="height: 200px; object-fit: cover;">
                            <?php endif; ?>
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="news-badge"><?php echo e($item->kategori ?? 'Umum'); ?></span>
                                    <span class="date-badge"><i class="far fa-calendar me-1"></i> <?php echo e($item->created_at ? $item->created_at->format('d M Y') : '-'); ?></span>
                                </div>
                                <h5 class="card-title fw-bold text-dark mb-3" style="font-family: var(--font-heading); font-size: 1.2rem;"><?php echo e($item->judul); ?></h5>
                                <p class="card-text text-muted small" style="line-height: 1.6;"><?php echo e(Str::limit(strip_tags($item->konten ?? $item->isi), 100)); ?></p>
                            </div>
                            <div class="card-footer bg-transparent border-0 px-4 pb-4">
                                <a href="#" class="text-decoration-none fw-bold text-primary">Baca Selengkapnya <i class="fas fa-chevron-right small ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-12 text-center text-muted py-4" data-aos="fade-up">Belum ada berita terbaru.</div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Prestasi Siswa -->
    <section id="prestasi" class="py-5 bg-light">
        <div class="container py-4">
            <div class="text-center mx-auto" style="max-width: 700px;" data-aos="fade-up">
                <span class="section-tag">Kebanggaan Sekolah</span>
                <h2 class="section-title">Prestasi Terbaru Teladan</h2>
                <div class="section-divider mx-auto"></div>
                <p class="text-muted fs-6">Raihan medali dan penghargaan dari para siswa SMA Negeri 1 Yogyakarta di tingkat regional, nasional, maupun internasional.</p>
            </div>

            <div class="row g-4 mt-3">
                <?php $__empty_1 = true; $__currentLoopData = $prestasis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="<?php echo e($loop->index * 100); ?>">
                        <div class="custom-card">
                            <?php if(isset($item->foto) && $item->foto): ?>
                                <img src="<?php echo e(asset('storage/' . $item->foto)); ?>" class="card-img-top" alt="<?php echo e($item->nama_prestasi ?? $item->judul); ?>" style="height: 200px; object-fit: cover;">
                            <?php elseif(isset($item->gambar) && $item->gambar): ?>
                                <img src="<?php echo e(asset('storage/prestasi/' . $item->gambar)); ?>" class="card-img-top" alt="<?php echo e($item->nama_prestasi ?? $item->judul); ?>" style="height: 200px; object-fit: cover;">
                            <?php else: ?>
                                <img src="https://images.unsplash.com/photo-1567427017947-545c5f8d16ad?q=80&w=600&auto=format&fit=crop" class="card-img-top" alt="Default Prestasi" style="height: 200px; object-fit: cover;">
                            <?php endif; ?>
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="badge bg-danger"><?php echo e($item->tingkat ?? 'Nasional'); ?></span>
                                    <span class="date-badge"><i class="fas fa-trophy text-warning me-1"></i> Juara</span>
                                </div>
                                <h5 class="card-title fw-bold text-dark mb-2" style="font-family: var(--font-heading); font-size: 1.15rem;">
                                    <?php echo e($item->nama_prestasi ?? $item->judul); ?>

                                </h5>
                                <p class="card-text text-muted small mb-0">
                                    <i class="fas fa-user me-1 text-secondary"></i> <?php echo e($item->nama_siswa ?? $item->pemenang); ?> (<?php echo e($item->kelas ?? '-'); ?>)
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-12 text-center text-muted py-4" data-aos="fade-up">Belum ada data prestasi.</div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Ekstrakurikuler & Organisasi -->
    <section id="ekstrakurikuler" class="py-5">
        <div class="container py-4">
            <div class="text-center mx-auto mb-4" style="max-width: 650px;" data-aos="fade-up">
                <span class="section-tag">Pengembangan Diri</span>
                <h2 class="section-title">Ekstrakurikuler & Organisasi</h2>
                <div class="section-divider mx-auto"></div>
            </div>

            <div class="row g-4">
                <?php $__empty_1 = true; $__currentLoopData = $ekskuls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="<?php echo e($loop->index * 50); ?>">
                        <div class="custom-card text-center">
                            <?php if(isset($item->foto) && $item->foto): ?>
                                <img src="<?php echo e(asset('storage/' . $item->foto)); ?>" class="card-img-top" alt="<?php echo e($item->nama_ekskul ?? $item->nama); ?>" style="height: 180px; object-fit: cover;">
                            <?php elseif(isset($item->gambar) && $item->gambar): ?>
                                <img src="<?php echo e(asset('storage/' . $item->gambar)); ?>" class="card-img-top" alt="<?php echo e($item->nama_ekskul ?? $item->nama); ?>" style="height: 180px; object-fit: cover;">
                            <?php else: ?>
                                <img src="https://images.unsplash.com/photo-1511632765486-a01980e01a18?q=80&w=600&auto=format&fit=crop" class="card-img-top" alt="Default Ekskul" style="height: 180px; object-fit: cover;">
                            <?php endif; ?>
                            <div class="card-body p-3">
                                <h6 class="fw-bold text-dark mb-1" style="font-family: var(--font-heading);">
                                    <?php echo e($item->nama_ekskul ?? $item->nama); ?>

                                </h6>
                                <?php if(isset($item->deskripsi) || isset($item->keterangan)): ?>
                                    <p class="text-muted small mb-0"><?php echo e(Str::limit($item->deskripsi ?? $item->keterangan, 60)); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-12 text-center text-muted py-4" data-aos="fade-up">Belum ada data ekstrakurikuler.</div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Tenaga Pendidik / Guru (Swiper Auto-slide Slider) -->
    <section id="guru" class="py-5 bg-light">
        <div class="container py-4">
            <div class="d-flex flex-wrap justify-content-between align-items-end mb-4" data-aos="fade-up">
                <div>
                    <span class="section-tag">Pengajar Berdedikasi</span>
                    <h2 class="section-title mb-0">Guru & Tenaga Kependidikan</h2>
                </div>
                <a href="<?php echo e(route('public.guru')); ?>" class="btn btn-outline-navy mt-3 mt-md-0">Direktori Lengkap Guru</a>
            </div>
            <div class="section-divider" data-aos="fade-up"></div>

            <!-- Swiper Container -->
            <div class="swiper swiperGuru py-3" data-aos="fade-up">
                <div class="swiper-wrapper">
                    <?php $__empty_1 = true; $__currentLoopData = $gurus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="swiper-slide">
                            <div class="teacher-card text-center p-4 bg-white rounded-4 shadow-sm border h-100">
                                <!-- Foto Guru -->
                                <div class="teacher-avatar mx-auto mb-3" style="width: 110px; height: 110px; border-radius: 50%; overflow: hidden; border: 3px solid var(--accent-gold);">
                                    <?php if(isset($item->foto) && $item->foto && Storage::disk('public')->exists($item->foto)): ?>
                                        <img src="<?php echo e(asset('storage/' . $item->foto)); ?>" alt="<?php echo e($item->nama_guru ?? $item->nama ?? 'Guru'); ?>" class="w-100 h-100 object-fit-cover">
                                    <?php else: ?>
                                        <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode($item->nama_guru ?? $item->nama ?? 'Guru')); ?>&background=002147&color=fff" alt="<?php echo e($item->nama_guru ?? $item->nama ?? 'Guru'); ?>" class="w-100 h-100 object-fit-cover">
                                    <?php endif; ?>
                                </div>

                                <!-- Nama Guru -->
                                <h5 class="fw-bold mb-1 text-dark fs-6" style="font-family: var(--font-body);">
                                    <?php echo e($item->nama_guru ?? $item->nama ?? 'Nama Guru'); ?>

                                </h5>

                                <!-- Mata Pelajaran -->
                                <p class="text-muted small mb-0">
                                    <?php echo e($item->mapel ?? $item->mata_pelajaran ?? 'Pengajar'); ?>

                                </p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="swiper-slide">
                            <div class="text-center text-muted py-4 w-100">Belum ada data guru.</div>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Pagination Dots -->
                <div class="swiper-pagination mt-4"></div>
            </div>
        </div>
    </section>

    <!-- Section Kontak -->
    <section id="kontak" class="py-5">
        <div class="container py-4">
            <div class="row g-5">
                <div class="col-lg-6" data-aos="fade-right" data-aos-duration="800">
                    <span class="section-tag">Lokasi & Alamat</span>
                    <h2 class="section-title">Hubungi Kami</h2>
                    <div class="section-divider"></div>

                    <div class="mb-4">
                        <div class="d-flex gap-3 mb-3">
                            <div class="text-warning fs-4"><i class="fas fa-map-marker-alt"></i></div>
                            <div>
                                <h6 class="fw-bold mb-1">Alamat Sekolah</h6>
                                <p class="text-muted mb-0">Jl. HOS Cokroaminoto No.10, Pakuncen, Wirobrajan, Kota Yogyakarta</p>
                            </div>
                        </div>

                        <div class="d-flex gap-3 mb-3">
                            <div class="text-warning fs-4"><i class="fas fa-phone-alt"></i></div>
                            <div>
                                <h6 class="fw-bold mb-1">Telepon & Fax</h6>
                                <p class="text-muted mb-0">(0274) 513454</p>
                            </div>
                        </div>

                        <div class="d-flex gap-3">
                            <div class="text-warning fs-4"><i class="fas fa-envelope"></i></div>
                            <div>
                                <h6 class="fw-bold mb-1">Email Resmi</h6>
                                <p class="text-muted mb-0">humas@sman1yogya.sch.id</p>
                            </div>
                        </div>
                    </div>

                    <!-- Embed Map -->
                    <div class="rounded-3 overflow-hidden border shadow-sm">
                        <iframe title="Lokasi SMAN 1 Yogyakarta" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.9535091238994!2d110.3512343!3d-7.79478!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a578f18bc51b5%3A0xb304918e7e17cb75!2sSMA%20Negeri%201%20Yogyakarta!5e0!3m2!1sid!2sid" width="100%" height="220" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="800">
                    <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm border">
                        <h4 class="fw-bold text-dark mb-2" style="font-family: var(--font-heading);">Layanan Informasi & Kontak</h4>
                        <p class="text-muted small mb-4">Hubungi layanan administrasi atau Humas SMAN 1 Yogyakarta secara langsung melalui saluran berikut:</p>

                        <div class="d-grid gap-3 pt-2">
                            <a href="https://wa.me/6281234567890" target="_blank" class="btn btn-success btn-lg fw-bold d-flex align-items-center justify-content-center gap-2">
                                <i class="fab fa-whatsapp fs-4"></i> Chat WhatsApp Humas
                            </a>
                            <a href="mailto:humas@sman1yogya.sch.id" class="btn btn-gold btn-lg fw-bold d-flex align-items-center justify-content-center gap-2">
                                <i class="fas fa-envelope fs-5"></i> Kirim Email Resmi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Visi & Misi -->
    <div class="modal fade" id="modalVisiMisi" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header style-navy" style="background-color: var(--primary-navy); color: #FFF;">
                    <h5 class="modal-header-title fw-bold mb-0" style="font-family: var(--font-heading);"><i class="fas fa-bullseye me-2 text-warning"></i>Visi & Misi</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <h6 class="fw-bold text-primary">VISI SEKOLAH</h6>
                    <div class="bg-light p-3 rounded border-start border-4 border-warning fw-medium" style="font-family: var(--font-heading); font-style: italic; font-size: 1.1rem;">
                        "Terwujudnya insan teladan yang unggul dalam prestasi, berkarakter Pancasila, berwawasan lingkungan, dan bersaing global."
                    </div>

                    <h6 class="fw-bold text-primary mt-4">MISI SEKOLAH</h6>
                    <div class="text-muted leading-relaxed">
                        <ol>
                            <li>Menyelenggarakan proses pembelajaran berstandar internasional.</li>
                            <li>Mengembangkan potensi minat dan bakat peserta didik.</li>
                        </ol>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        // Inisialisasi Swiper Carousel Guru khusus di Dashboard
        document.addEventListener('DOMContentLoaded', function () {
            if (document.querySelector('.swiperGuru')) {
                new Swiper('.swiperGuru', {
                    slidesPerView: 1,
                    spaceBetween: 20,
                    loop: true,
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    breakpoints: {
                        576: {
                            slidesPerView: 2,
                            spaceBetween: 20,
                        },
                        992: {
                            slidesPerView: 3,
                            spaceBetween: 30,
                        },
                    },
                });
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('public.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\website_sekolah\resources\views/public/dashboard.blade.php ENDPATH**/ ?>