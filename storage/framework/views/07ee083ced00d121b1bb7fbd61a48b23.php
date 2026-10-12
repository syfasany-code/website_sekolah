<?php $__env->startSection('title', ($profil->nama_sekolah ?? 'SMA Negeri 1 Yogyakarta') . ' - Teladan Jayamahe'); ?>

<?php $__env->startSection('content'); ?>

    <!-- Section Hero Utama -->
    <section id="beranda" class="hero-section">
        <div class="container position-relative" style="z-index: 2;">
            <div class="row align-items-center gy-5">
                <div class="col-lg-7" data-aos="fade-right" data-aos-duration="1000">
                    <span class="hero-badge"><i class="fas fa-award me-2"></i> Sekolah Penggerak & Berwawasan Global</span>
                    <h1 class="display-3 text-white mb-3"><?php echo e($profil->nama_sekolah ?? 'SMA Negeri 1 Yogyakarta'); ?></h1>
                    <p class="lead text-light opacity-90 mb-4 fs-5" style="line-height: 1.8; font-weight: 400;">
                        <?php echo e($profil->deskripsi ?? 'SMA Negeri 1 Yogyakarta senantiasa mengintegrasikan kecerdasan akademis, integritas moral, dan wawasan kebangsaan berlandaskan semangat motto Teladan Jayamahe.'); ?>

                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#profil" class="btn btn-gold btn-lg">Eksplorasi Profil Sekolah</a>
                        <a href="#prestasi" class="btn btn-outline-light btn-lg fw-bold">Daftar Prestasi Siswa</a>
                    </div>

                    <!-- Ringkasan Statistik -->
                    <div class="row g-4 my-4">
                        <div class="col-md-4">
                            <div class="feature-card p-4 rounded-3 h-100 text-center">
                                <span class="badge bg-warning text-dark mb-2 fw-bold">Pillar 01</span>
                                <h6 class="fw-bold text-white mb-2">Integritas</h6>
                                <p class="small text-white-50 mb-0">Membentuk pribadi yang jujur, beretika, dan bertindak
                                    sesuai dengan nilai moral tinggi.</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="feature-card p-4 rounded-3 h-100 text-center">
                                <span class="badge bg-warning text-dark mb-2 fw-bold">Pillar 02</span>
                                <h6 class="fw-bold text-white mb-2">Keunggulan</h6>
                                <p class="small text-white-50 mb-0">Selalu mendorong seluruh civitas akademika untuk
                                    mencapai potensi prestasi terbaik.</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="feature-card p-4 rounded-3 h-100 text-center">
                                <span class="badge bg-warning text-dark mb-2 fw-bold">Pillar 03</span>
                                <h6 class="fw-bold text-white mb-2">Karakter</h6>
                                <p class="small text-white-50 mb-0">Menanamkan jiwa kepemimpinan, kepedulian sosial, serta
                                    rasa cinta tanah air.</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-5 text-center" data-aos="fade-left" data-aos-duration="1000">
                    <div class="position-relative d-inline-block">
                        <!-- Foto Gedung Statis (Selalu Menggunakan File Lokal) -->
                        <img src="<?php echo e(asset('images/smaaa.jpg')); ?>" alt="Gedung Sekolah"
                            class="img-fluid rounded-4 shadow-lg border border-3 border-warning"
                            style="max-height: 420px; object-fit: cover;">

                        <div class="bg-white text-dark p-3 rounded-3 shadow position-absolute bottom-0 start-0 m-3 text-start border-start border-4 border-warning"
                            style="max-width: 260px;">
                            <i class="fas fa-quote-left text-warning mb-1 fs-5"></i>
                            <p class="small mb-0 fw-semibold fs-6"
                                style="font-family: var(--font-heading); font-style: italic;">"Berjaya di mana pun dan kapan
                                pun."</p>
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
                        <?php if(!empty($profil->foto) && Storage::disk('public')->exists('sekolah/' . $profil->foto)): ?>
                            <img src="<?php echo e(asset('storage/sekolah/' . $profil->foto)); ?>" alt="Kepala Sekolah"
                                class="img-fluid w-100" style="height: 480px; object-fit: cover;">
                        <?php elseif(!empty($profil->foto) && Storage::disk('public')->exists($profil->foto)): ?>
                            <img src="<?php echo e(asset('storage/' . $profil->foto)); ?>" alt="Kepala Sekolah" class="img-fluid w-100"
                                style="height: 480px; object-fit: cover;">
                        <?php else: ?>
                            <img src="<?php echo e(asset('images/kepalasekolah.jpg')); ?>" alt="Kepala Sekolah" class="img-fluid w-100"
                                style="height: 480px; object-fit: cover;">
                        <?php endif; ?>

                        <div class="principal-info-overlay">
                            <h4 class="mb-0 text-white fw-bold" style="font-family: var(--font-heading);">
                                <?php echo e($profil->kepala_sekolah ?? 'Ngadiya, S.Pd., M.M.'); ?>

                            </h4>
                            <small class="text-warning fw-semibold">
                                Kepala Sekolah <?php echo e($profil->nama_sekolah ?? 'SMA Negeri 1 Yogyakarta'); ?>

                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 ps-lg-5" data-aos="fade-left" data-aos-duration="800">
                    <span class="section-tag">Sambutan Pimpinan</span>
                    <h2 class="section-title">Selamat Datang di <?php echo e($profil->nama_sekolah ?? 'SMA Negeri 1 Yogyakarta'); ?>

                    </h2>
                    <div class="section-divider"></div>

                    <!-- Menampilkan Deskripsi/Sambutan dari Database -->
                    <div class="text-muted leading-relaxed fs-6">
                        <p><?php echo nl2br(
                            e(
                                $profil->deskripsi ??
                                    'Puji dan syukur kita panjatkan ke hadirat Allah SWT. Sekolah terus berkomitmen menjadi wadah pembelajaran berkualitas tinggi.',
                            ),
                        ); ?></p>
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

    <!-- Modal Visi & Misi -->
    <div class="modal fade" id="modalVisiMisi" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header style-navy" style="background-color: var(--primary-navy); color: #FFF;">
                    <h5 class="modal-header-title fw-bold mb-0" style="font-family: var(--font-heading);">
                        <i class="fas fa-bullseye me-2 text-warning"></i>Visi & Misi Sekolah
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <h6 class="fw-bold text-primary mb-3">VISI & MISI SEKOLAH</h6>

                    
                    <?php if(!empty($profil->visi_misi)): ?>
                        <div
                            class="text-dark leading-relaxed style-visimisi-content p-3 bg-light rounded border-start border-4 border-warning">
                            <?php echo nl2br(e($profil->visi_misi)); ?>

                        </div>
                    <?php else: ?>
                        <div class="text-muted">
                            Data Visi & Misi belum diisi oleh admin.
                        </div>
                    <?php endif; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Berita Terbaru -->
    <section id="berita" class="py-5">
        <div class="container py-4">
            <div class="d-flex flex-wrap justify-content-between align-items-end mb-4" data-aos="fade-up">
                <div>
                    <span class="section-tag">Kabar Sekolah</span>
                    <h2 class="section-title mb-0">Berita & Informasi Terbaru</h2>
                </div>
                <a href="<?php echo e(route('public.berita')); ?>" class="btn btn-outline-navy mt-3 mt-md-0">
                    Lihat Semua Berita <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
            <div class="section-divider" data-aos="fade-up"></div>

            <div class="row g-4">
                <?php $__empty_1 = true; $__currentLoopData = $beritas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $idBerita = $item->getKey() ?? ($item->id_berita ?? $item->id);
                    ?>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?php echo e($loop->index * 100); ?>">
                        <div class="custom-card">
                            <?php if($item->gambar && Storage::disk('public')->exists('berita/' . $item->gambar)): ?>
                                <img src="<?php echo e(asset('storage/berita/' . $item->gambar)); ?>" class="card-img-top"
                                    alt="<?php echo e($item->judul); ?>" style="height: 200px; object-fit: cover;">
                            <?php elseif($item->gambar && Storage::disk('public')->exists($item->gambar)): ?>
                                <img src="<?php echo e(asset('storage/' . $item->gambar)); ?>" class="card-img-top"
                                    alt="<?php echo e($item->judul); ?>" style="height: 200px; object-fit: cover;">
                            <?php else: ?>
                                <div class="bg-light d-flex align-items-center justify-content-center text-muted"
                                    style="height: 200px;">
                                    <i class="fas fa-newspaper fa-3x"></i>
                                </div>
                            <?php endif; ?>
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="news-badge"><?php echo e($item->kategori ?? 'Umum'); ?></span>
                                    <span class="date-badge"><i class="far fa-calendar me-1"></i>
                                        <?php echo e($item->created_at ? $item->created_at->format('d M Y') : '-'); ?></span>
                                </div>
                                <h5 class="card-title fw-bold text-dark mb-3"
                                    style="font-family: var(--font-heading); font-size: 1.2rem;"><?php echo e($item->judul); ?></h5>
                                <p class="card-text text-muted small" style="line-height: 1.6;">
                                    <?php echo e(Str::limit(strip_tags($item->konten ?? $item->isi), 100)); ?></p>
                            </div>
                            <div class="card-footer bg-transparent border-0 px-4 pb-4">
                                <a href="<?php echo e(route('public.berita.show', $idBerita)); ?>"
                                    class="text-decoration-none fw-bold text-primary">
                                    Baca Selengkapnya <i class="fas fa-chevron-right small ms-1"></i>
                                </a>
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
            <div class="d-flex flex-wrap justify-content-between align-items-end mb-4" data-aos="fade-up">
                <div>
                    <span class="section-tag">Kebanggaan Sekolah</span>
                    <h2 class="section-title mb-0">Prestasi Terbaru Teladan</h2>
                </div>
                <a href="<?php echo e(route('public.prestasi')); ?>" class="btn btn-outline-navy mt-3 mt-md-0">
                    Lihat Lebih Lengkap <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
            <div class="section-divider" data-aos="fade-up"></div>

            <div class="row g-4 mt-1">
                <?php $__empty_1 = true; $__currentLoopData = $prestasis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $idPrestasi = $item->getKey() ?? ($item->id_prestasi ?? $item->id);
                        $fotoPrestasi = $item->foto ?? ($item->gambar ?? null);
                    ?>
                    <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="<?php echo e($loop->index * 100); ?>">
                        <div class="custom-card h-100 d-flex flex-column">
                            <?php if(!empty($fotoPrestasi) && Storage::disk('public')->exists('prestasi/' . $fotoPrestasi)): ?>
                                <img src="<?php echo e(asset('storage/prestasi/' . $fotoPrestasi)); ?>" class="card-img-top"
                                    alt="<?php echo e($item->nama_prestasi ?? $item->judul); ?>"
                                    style="height: 200px; object-fit: cover;">
                            <?php elseif(!empty($fotoPrestasi) && Storage::disk('public')->exists($fotoPrestasi)): ?>
                                <img src="<?php echo e(asset('storage/' . $fotoPrestasi)); ?>" class="card-img-top"
                                    alt="<?php echo e($item->nama_prestasi ?? $item->judul); ?>"
                                    style="height: 200px; object-fit: cover;">
                            <?php else: ?>
                                <div class="bg-light d-flex align-items-center justify-content-center text-muted"
                                    style="height: 200px;">
                                    <i class="fas fa-trophy fa-3x text-warning"></i>
                                </div>
                            <?php endif; ?>
                            <div class="card-body p-4 d-flex flex-column">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="badge bg-danger"><?php echo e($item->tingkat ?? 'Nasional'); ?></span>
                                    <span class="date-badge"><i class="fas fa-trophy text-warning me-1"></i> Juara</span>
                                </div>
                                <h5 class="card-title fw-bold text-dark mb-2"
                                    style="font-family: var(--font-heading); font-size: 1.15rem;">
                                    <?php echo e($item->nama_prestasi ?? $item->judul); ?>

                                </h5>
                                <p class="card-text text-muted small mb-3">
                                    <i class="fas fa-user me-1 text-secondary"></i>
                                    <?php echo e($item->nama_peraih ?? $item->pemenang); ?>

                                </p>
                                <div class="mt-auto pt-2">
                                    <a href="<?php echo e(route('public.prestasi.show', $idPrestasi)); ?>"
                                        class="text-decoration-none fw-semibold small text-primary">
                                        Detail Prestasi <i class="fas fa-chevron-right ms-1 style-xs"></i>
                                    </a>
                                </div>
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
            <div class="d-flex flex-wrap justify-content-between align-items-end mb-4" data-aos="fade-up">
                <div>
                    <span class="section-tag">Pengembangan Diri</span>
                    <h2 class="section-title mb-0">Ekstrakurikuler & Organisasi</h2>
                </div>
                <a href="<?php echo e(route('public.ekstrakulikuler')); ?>" class="btn btn-outline-navy mt-3 mt-md-0">
                    Lihat Lebih Lengkap <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
            <div class="section-divider" data-aos="fade-up"></div>

            <div class="row g-4">
                <?php $__empty_1 = true; $__currentLoopData = $ekskuls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $idEkskul = $item->getKey() ?? ($item->id_ekstrakulikuler ?? ($item->id_ekskul ?? $item->id));
                        $namaEkskul = $item->nama_ekskul ?? ($item->nama_ekstrakulikuler ?? $item->nama);
                        $fotoEkskul = $item->foto ?? ($item->gambar ?? null);
                    ?>
                    <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="<?php echo e($loop->index * 50); ?>">
                        <div class="custom-card text-center h-100 d-flex flex-column">
                            <?php if(!empty($fotoEkskul) && Storage::disk('public')->exists('ekstrakulikuler/' . $fotoEkskul)): ?>
                                <img src="<?php echo e(asset('storage/ekstrakulikuler/' . $fotoEkskul)); ?>" class="card-img-top"
                                    alt="<?php echo e($namaEkskul); ?>" style="height: 180px; object-fit: cover;">
                            <?php elseif(!empty($fotoEkskul) && Storage::disk('public')->exists($fotoEkskul)): ?>
                                <img src="<?php echo e(asset('storage/' . $fotoEkskul)); ?>" class="card-img-top"
                                    alt="<?php echo e($namaEkskul); ?>" style="height: 180px; object-fit: cover;">
                            <?php else: ?>
                                <div class="bg-light d-flex align-items-center justify-content-center text-muted"
                                    style="height: 180px;">
                                    <i class="fas fa-users fa-3x"></i>
                                </div>
                            <?php endif; ?>
                            <div class="card-body p-3 d-flex flex-column">
                                <h6 class="fw-bold text-dark mb-2" style="font-family: var(--font-heading);">
                                    <?php echo e($namaEkskul); ?>

                                </h6>
                                <?php if(isset($item->deskripsi) || isset($item->keterangan)): ?>
                                    <p class="text-muted small mb-3">
                                        <?php echo e(Str::limit(strip_tags($item->deskripsi ?? $item->keterangan), 60)); ?></p>
                                <?php endif; ?>

                                <div class="mt-auto pt-2">
                                    <a href="<?php echo e(route('public.ekstrakulikuler.show', $idEkskul)); ?>"
                                        class="text-decoration-none fw-semibold small text-primary">
                                        Detail Ekskul <i class="fas fa-chevron-right ms-1 style-xs"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-12 text-center text-muted py-4" data-aos="fade-up">Belum ada data ekstrakurikuler.
                    </div>
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
                                <div class="teacher-avatar mx-auto mb-3"
                                    style="width: 110px; height: 110px; border-radius: 50%; overflow: hidden; border: 3px solid var(--accent-gold);">
                                    <?php if(isset($item->foto) && $item->foto && Storage::disk('public')->exists('guru/' . $item->foto)): ?>
                                        <img src="<?php echo e(asset('storage/guru/' . $item->foto)); ?>"
                                            alt="<?php echo e($item->nama_guru ?? ($item->nama ?? 'Guru')); ?>"
                                            class="w-100 h-100 object-fit-cover">
                                    <?php elseif(isset($item->foto) && $item->foto && Storage::disk('public')->exists($item->foto)): ?>
                                        <img src="<?php echo e(asset('storage/' . $item->foto)); ?>"
                                            alt="<?php echo e($item->nama_guru ?? ($item->nama ?? 'Guru')); ?>"
                                            class="w-100 h-100 object-fit-cover">
                                    <?php else: ?>
                                        <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode($item->nama_guru ?? ($item->nama ?? 'Guru'))); ?>&background=002147&color=fff"
                                            alt="<?php echo e($item->nama_guru ?? ($item->nama ?? 'Guru')); ?>"
                                            class="w-100 h-100 object-fit-cover">
                                    <?php endif; ?>
                                </div>

                                <h5 class="fw-bold mb-1 text-dark fs-6" style="font-family: var(--font-body);">
                                    <?php echo e($item->nama_guru ?? ($item->nama ?? 'Nama Guru')); ?>

                                </h5>

                                <p class="text-muted small mb-0">
                                    <?php echo e($item->mapel ?? ($item->mata_pelajaran ?? 'Pengajar')); ?>

                                </p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="swiper-slide">
                            <div class="text-center text-muted py-4 w-100">Belum ada data guru.</div>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="swiper-pagination mt-4"></div>
            </div>
        </div>
    </section>

    <section id="siswa" class="py-5 bg-white">
        <div class="container py-4">
            <div class="d-flex flex-wrap justify-content-between align-items-end mb-4" data-aos="fade-up">
                <div>
                    <span class="section-tag">Daftar Peserta Didik</span>
                    <h2 class="section-title mb-0">Data Siswa</h2>
                </div>
            </div>
            <div class="section-divider" data-aos="fade-up"></div>

            <div class="card border-0 shadow-sm rounded-4 overflow-hidden mt-3" data-aos="fade-up">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-dark" style="background-color: var(--primary-navy);">
                                <tr>
                                    <th class="py-3 px-4" style="width: 5%;">No</th>
                                    <th class="py-3 px-4">Nama Siswa</th>
                                    <th class="py-3 px-4">Kelas</th>
                                    <th class="py-3 px-4">Jenis Kelamin</th>
                                    <th class="py-3 px-4">Tahun Masuk</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $siswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($s->nama_siswa); ?></td>
                                        <td>
                                            
                                            <?php if($s->kelas): ?>
                                                <span class="badge bg-success"><?php echo e($s->kelas->nama_kelas); ?></span>
                                            <?php else: ?>
                                                <span class="badge bg-warning text-dark">Belum ada kelas</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($s->jenis_kelamin); ?></td>
                                        <td><?php echo e($s->tahun_masuk); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- GALERI KEGIATAN SEKOLAH -->
    <section id="galeri" class="py-5 bg-white">
        <div class="container py-4">
            <div class="d-flex flex-wrap justify-content-between align-items-end mb-4" data-aos="fade-up">
                <div>
                    <span class="section-tag">Dokumentasi Sekolah</span>
                    <h2 class="section-title mb-0">Galeri & Kegiatan</h2>
                </div>
                <a href="<?php echo e(route('public.galeri')); ?>" class="btn btn-outline-navy mt-3 mt-md-0">
                    Lihat Semua Galeri <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
            <div class="section-divider" data-aos="fade-up"></div>

            <div class="row g-4 mt-1">
                <?php $__empty_1 = true; $__currentLoopData = $galeris ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $fotoGaleri = $item->file ?? ($item->foto ?? ($item->gambar ?? null));
                        $judulGaleri = $item->judul ?? ($item->keterangan ?? 'Dokumentasi Sekolah');
                        $kategori = strtolower($item->kategori ?? 'foto');
                    ?>
                    <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="<?php echo e($loop->index * 100); ?>">
                        <div class="position-relative overflow-hidden rounded-4 shadow-sm style-gallery-card">
                            <?php if($kategori === 'foto' && !empty($fotoGaleri) && Storage::disk('public')->exists('galeri/' . $fotoGaleri)): ?>
                                <img src="<?php echo e(asset('storage/galeri/' . $fotoGaleri)); ?>" class="w-100 rounded-4"
                                    alt="<?php echo e($judulGaleri); ?>" style="height: 250px; object-fit: cover;">
                            <?php elseif($kategori === 'foto' && !empty($fotoGaleri) && Storage::disk('public')->exists($fotoGaleri)): ?>
                                <img src="<?php echo e(asset('storage/' . $fotoGaleri)); ?>" class="w-100 rounded-4"
                                    alt="<?php echo e($judulGaleri); ?>" style="height: 250px; object-fit: cover;">
                            <?php elseif($kategori === 'video' && !empty($item->link)): ?>
                                <a href="<?php echo e($item->link); ?>" target="_blank" class="text-decoration-none">
                                    <div class="bg-dark d-flex flex-column align-items-center justify-content-center text-white rounded-4"
                                        style="height: 250px;">
                                        <i class="fab fa-youtube text-danger display-4 mb-2"></i>
                                        <span class="badge bg-danger">Tonton Video</span>
                                    </div>
                                </a>
                            <?php else: ?>
                                <div class="bg-secondary d-flex align-items-center justify-content-center text-white rounded-4"
                                    style="height: 250px;">
                                    <i class="fas fa-image fa-3x opacity-50"></i>
                                </div>
                            <?php endif; ?>

                            <div class="gallery-overlay p-3 d-flex flex-column justify-content-end rounded-4">
                                <h6 class="text-white fw-bold mb-0" style="font-family: var(--font-heading);">
                                    <?php echo e($judulGaleri); ?></h6>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-12 text-center text-muted py-4" data-aos="fade-up">
                        Belum ada dokumentasi galeri terbaru.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Modal Visi & Misi -->
    <div class="modal fade" id="modalVisiMisi" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header style-navy" style="background-color: var(--primary-navy); color: #FFF;">
                    <h5 class="modal-header-title fw-bold mb-0" style="font-family: var(--font-heading);"><i
                            class="fas fa-bullseye me-2 text-warning"></i>Visi & Misi</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <h6 class="fw-bold text-primary">VISI SEKOLAH</h6>
                    <div class="bg-light p-3 rounded border-start border-4 border-warning fw-medium mb-4"
                        style="font-family: var(--font-heading); font-style: italic; font-size: 1.1rem;">
                        "<?php echo e($profil->visi ?? 'Terwujudnya insan teladan yang unggul dalam prestasi, berkarakter Pancasila, berwawasan lingkungan, dan bersaing global.'); ?>"
                    </div>

                    <h6 class="fw-bold text-primary">MISI SEKOLAH</h6>
                    <div class="text-muted leading-relaxed">
                        <?php if(!empty($profil->misi)): ?>
                            <?php echo nl2br(e($profil->misi)); ?>

                        <?php else: ?>
                            <ol>
                                <li>Menyelenggarakan proses pembelajaran berstandar internasional.</li>
                                <li>Mengembangkan potensi minat dan bakat peserta didik.</li>
                            </ol>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        .style-gallery-card {
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .style-gallery-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15) !important;
        }

        .gallery-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            top: 0;
            background: linear-gradient(to top, rgba(0, 33, 71, 0.85) 0%, rgba(0, 33, 71, 0) 60%);
            opacity: 0.9;
            transition: opacity 0.3s ease;
        }

        .style-gallery-card:hover .gallery-overlay {
            opacity: 1;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var swiperEl = document.querySelector('.swiperGuru');

            if (swiperEl) {
                var slideCount = swiperEl.querySelectorAll('.swiper-slide').length;

                new Swiper('.swiperGuru', {
                    slidesPerView: 1,
                    spaceBetween: 20,
                    loop: slideCount > 3,
                    autoplay: {
                        delay: 2500,
                        disableOnInteraction: false,
                        pauseOnMouseEnter: true,
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    breakpoints: {
                        576: {
                            slidesPerView: Math.min(2, slideCount),
                            spaceBetween: 20,
                        },
                        992: {
                            slidesPerView: Math.min(3, slideCount),
                            spaceBetween: 30,
                        },
                    },
                });
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('public.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\website_sekolah\resources\views/public/dashboard.blade.php ENDPATH**/ ?>