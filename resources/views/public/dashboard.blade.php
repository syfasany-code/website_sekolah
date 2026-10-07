<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMA Negeri 1 Yogyakarta - Teladan Jayamahe</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts Premium: Playfair Display & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- AOS Library CSS -->
    <link rel="stylesheet" href="{{ asset('aos/aos.css') }}">

    <style>
        :root {
            --primary-navy: #002147;
            --primary-dark-navy: #001530;
            --accent-gold: #DAA520;
            --accent-gold-hover: #b8860b;
            --light-bg: #F4F7FA;
            --text-dark: #0F172A;
            --text-muted: #475569;
            --card-shadow: 0 10px 30px rgba(0, 33, 71, 0.08);

            /* Tipografi */
            --font-heading: 'Playfair Display', serif;
            --font-body: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            font-family: var(--font-body);
            color: var(--text-dark);
            background-color: #FFFFFF;
            overflow-x: hidden;
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
        }

        h1, h2, h3, .serif-font, .section-title {
            font-family: var(--font-heading);
            letter-spacing: -0.02em;
        }

        h4, h5, h6, .fw-bold {
            font-family: var(--font-body);
            letter-spacing: -0.01em;
        }

        /* Top Header */
        .top-header {
            background-color: var(--primary-dark-navy);
            color: #E2E8F0;
            font-size: 0.85rem;
            padding: 8px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            font-weight: 500;
        }

        .top-header a {
            color: #E2E8F0;
            text-decoration: none;
            transition: color 0.2s;
        }

        .top-header a:hover {
            color: var(--accent-gold);
        }

        /* Navbar */
        .navbar-custom {
            background-color: var(--primary-navy);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            padding: 12px 0;
            transition: all 0.3s ease;
        }

        .navbar-custom .navbar-brand {
            font-weight: 800;
            color: #FFFFFF;
            font-size: 1.35rem;
            display: flex;
            align-items: center;
            gap: 12px;
            font-family: var(--font-body);
        }

        .brand-logo-icon {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, var(--accent-gold), #FFD700);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-navy);
            font-size: 1.4rem;
            box-shadow: 0 4px 10px rgba(218, 165, 32, 0.4);
        }

        .navbar-custom .nav-link {
            color: rgba(255, 255, 255, 0.9);
            font-weight: 600;
            padding: 8px 16px !important;
            border-radius: 6px;
            transition: all 0.2s ease;
            font-size: 0.92rem;
            letter-spacing: 0.3px;
        }

        .navbar-custom .nav-link:hover,
        .navbar-custom .nav-link.active {
            color: var(--accent-gold);
            background-color: rgba(255, 255, 255, 0.05);
        }

        .btn-gold {
            background-color: var(--accent-gold);
            color: var(--primary-navy);
            font-weight: 700;
            border: none;
            padding: 12px 26px;
            border-radius: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(218, 165, 32, 0.3);
            letter-spacing: 0.3px;
        }

        .btn-gold:hover {
            background-color: var(--accent-gold-hover);
            color: #FFFFFF;
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(218, 165, 32, 0.4);
        }

        .btn-outline-navy {
            border: 2px solid var(--primary-navy);
            color: var(--primary-navy);
            font-weight: 700;
            padding: 10px 24px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-outline-navy:hover {
            background-color: var(--primary-navy);
            color: #FFFFFF;
        }

        /* Hero */
        .hero-section {
            background: linear-gradient(135deg, var(--primary-dark-navy) 0%, var(--primary-navy) 100%);
            color: white;
            position: relative;
            padding: 100px 0 120px 0;
            overflow: hidden;
        }

        .hero-section h1 {
            font-family: var(--font-heading);
            font-weight: 800;
            line-height: 1.2;
            letter-spacing: -0.02em;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(218, 165, 32, 0.15) 0%, rgba(0, 33, 71, 0) 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .hero-badge {
            background-color: rgba(218, 165, 32, 0.2);
            color: var(--accent-gold);
            border: 1px solid rgba(218, 165, 32, 0.4);
            padding: 8px 20px;
            border-radius: 30px;
            font-size: 0.85rem;
            font-weight: 700;
            display: inline-block;
            margin-bottom: 20px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        /* Ticker Bar */
        .ticker-bar {
            background-color: #001229;
            color: #FFF;
            border-bottom: 3px solid var(--accent-gold);
            padding: 12px 0;
            font-size: 0.95rem;
        }

        .ticker-title {
            background-color: var(--accent-gold);
            color: var(--primary-navy);
            font-weight: 800;
            font-size: 0.8rem;
            padding: 5px 14px;
            border-radius: 4px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Section Titles */
        .section-tag {
            color: var(--accent-gold);
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 0.85rem;
            margin-bottom: 8px;
            display: block;
            font-family: var(--font-body);
        }

        .section-title {
            color: var(--primary-navy);
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 15px;
        }

        .section-divider {
            width: 70px;
            height: 4px;
            background: var(--accent-gold);
            border-radius: 2px;
            margin-bottom: 30px;
        }

        /* Card Styles */
        .custom-card {
            background: #FFFFFF;
            border-radius: 12px;
            border: 1px solid #E2E8F0;
            box-shadow: var(--card-shadow);
            transition: all 0.3s ease;
            height: 100%;
            overflow: hidden;
        }

        .custom-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 35px rgba(0, 33, 71, 0.15);
            border-color: rgba(218, 165, 32, 0.3);
        }

        /* Principal Section */
        .principal-section {
            background-color: var(--light-bg);
            padding: 90px 0;
            position: relative;
        }

        .principal-img-container {
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 12px 30px rgba(0,0,0,0.15);
        }

        .principal-img-container::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 40%;
            background: linear-gradient(to top, rgba(0, 33, 71, 0.8), transparent);
        }

        .principal-info-overlay {
            position: absolute;
            bottom: 20px;
            left: 20px;
            right: 20px;
            color: white;
            z-index: 2;
        }

        /* News & Badges */
        .news-badge {
            background-color: var(--primary-navy);
            color: #FFF;
            font-size: 0.75rem;
            padding: 4px 10px;
            border-radius: 4px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .date-badge {
            font-size: 0.8rem;
            color: var(--text-muted);
            font-weight: 500;
        }

        /* Teacher Grid */
        .teacher-card {
            border-radius: 12px;
            overflow: hidden;
            background: #FFF;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            text-align: center;
            padding: 20px;
            border: 1px solid #EDF2F7;
        }

        .teacher-avatar {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background-color: var(--light-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px auto;
            color: var(--primary-navy);
            font-size: 2.2rem;
            border: 2px solid var(--accent-gold);
            overflow: hidden;
        }

        /* Footer */
        .main-footer {
            background-color: var(--primary-dark-navy);
            color: #94A3B8;
            padding: 70px 0 30px 0;
            border-top: 4px solid var(--accent-gold);
        }

        .footer-title {
            color: #FFFFFF;
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 8px;
        }

        .footer-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 35px;
            height: 2px;
            background-color: var(--accent-gold);
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #94A3B8;
            text-decoration: none;
            transition: color 0.2s;
        }

        .footer-links a:hover {
            color: var(--accent-gold);
        }

        .social-icon-btn {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
            color: #FFF;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 8px;
            transition: all 0.3s;
            text-decoration: none;
        }

        .social-icon-btn:hover {
            background: var(--accent-gold);
            color: var(--primary-navy);
            transform: translateY(-3px);
        }

        /* Stat Card */
        .stat-card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 20px;
            text-align: center;
        }

        .stat-number {
            font-family: var(--font-heading);
            font-size: 2.8rem;
            font-weight: 800;
            color: var(--accent-gold);
            line-height: 1;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

    <!-- Header Atas (Top Bar) -->
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

    <!-- Navigasi Utama -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <div class="brand-logo-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div>
                    <div style="font-size: 1.2rem; line-height: 1.1; font-weight: 800;">SMAN 1 YOGYAKARTA</div>
                    <small style="font-size: 0.72rem; color: var(--accent-gold); font-weight: 700; letter-spacing: 1.5px;">TELADAN JAYAMAHE</small>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item"><a class="nav-link active" href="#beranda">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#profil">Profil</a></li>
                    <li class="nav-item"><a class="nav-link" href="#berita">Berita & Informasi</a></li>
                    <li class="nav-item"><a class="nav-link" href="#prestasi">Prestasi</a></li>
                    <li class="nav-item"><a class="nav-link" href="#ekstrakurikuler">Ekstrakurikuler</a></li>
                    <li class="nav-item"><a class="nav-link" href="#guru">Guru & Staf</a></li>
                    <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                        <a href="#kontak" class="btn btn-gold text-decoration-none">Hubungi Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

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
                        <img src="{{ asset('images/smaaa.jpg') }}" alt="Gedung Sekolah" class="img-fluid rounded-4 shadow-lg border border-3 border-warning" style="max-height: 420px; object-fit: cover;">
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
                        <img src="{{ asset('images/kepalasekolah.jpg') }}" alt="Kepala Sekolah" class="img-fluid w-100" style="height: 480px; object-fit: cover;">
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
                @forelse ($beritas as $item)
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="custom-card">
                            @if($item->gambar)
                                <img src="{{ asset('storage/berita/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->judul }}" style="height: 200px; object-fit: cover;">
                            @else
                                <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=600&auto=format&fit=crop" class="card-img-top" alt="Default Berita" style="height: 200px; object-fit: cover;">
                            @endif
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="news-badge">{{ $item->kategori ?? 'Umum' }}</span>
                                    <span class="date-badge"><i class="far fa-calendar me-1"></i> {{ $item->created_at ? $item->created_at->format('d M Y') : '-' }}</span>
                                </div>
                                <h5 class="card-title fw-bold text-dark mb-3" style="font-family: var(--font-heading); font-size: 1.2rem;">{{ $item->judul }}</h5>
                                <p class="card-text text-muted small" style="line-height: 1.6;">{{ Str::limit(strip_tags($item->konten ?? $item->isi), 100) }}</p>
                            </div>
                            <div class="card-footer bg-transparent border-0 px-4 pb-4">
                                <a href="#" class="text-decoration-none fw-bold text-primary">Baca Selengkapnya <i class="fas fa-chevron-right small ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted py-4" data-aos="fade-up">Belum ada berita terbaru.</div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Prestasi Siswa (Dengan Gambar) -->
    <section id="prestasi" class="py-5 bg-light">
        <div class="container py-4">
            <div class="text-center mx-auto" style="max-width: 700px;" data-aos="fade-up">
                <span class="section-tag">Kebanggaan Sekolah</span>
                <h2 class="section-title">Prestasi Terbaru Teladan</h2>
                <div class="section-divider mx-auto"></div>
                <p class="text-muted fs-6">Raihan medali dan penghargaan dari para siswa SMA Negeri 1 Yogyakarta di tingkat regional, nasional, maupun internasional.</p>
            </div>

            <div class="row g-4 mt-3">
                @forelse ($prestasis as $item)
                    <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="custom-card">
                            @if(isset($item->foto) && $item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" alt="{{ $item->nama_prestasi ?? $item->judul }}" style="height: 200px; object-fit: cover;">
                            @elseif(isset($item->gambar) && $item->gambar)
                                <img src="{{ asset('storage/prestasi/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->nama_prestasi ?? $item->judul }}" style="height: 200px; object-fit: cover;">
                            @else
                                <img src="https://images.unsplash.com/photo-1567427017947-545c5f8d16ad?q=80&w=600&auto=format&fit=crop" class="card-img-top" alt="Default Prestasi" style="height: 200px; object-fit: cover;">
                            @endif
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="badge bg-danger">{{ $item->tingkat ?? 'Nasional' }}</span>
                                    <span class="date-badge"><i class="fas fa-trophy text-warning me-1"></i> Juara</span>
                                </div>
                                <h5 class="card-title fw-bold text-dark mb-2" style="font-family: var(--font-heading); font-size: 1.15rem;">
                                    {{ $item->nama_prestasi ?? $item->judul }}
                                </h5>
                                <p class="card-text text-muted small mb-0">
                                    <i class="fas fa-user me-1 text-secondary"></i> {{ $item->nama_siswa ?? $item->pemenang }} ({{ $item->kelas ?? '-' }})
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted py-4" data-aos="fade-up">Belum ada data prestasi.</div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Ekstrakurikuler & Organisasi (Dengan Gambar) -->
    <section id="ekstrakurikuler" class="py-5">
        <div class="container py-4">
            <div class="text-center mx-auto mb-4" style="max-width: 650px;" data-aos="fade-up">
                <span class="section-tag">Pengembangan Diri</span>
                <h2 class="section-title">Ekstrakurikuler & Organisasi</h2>
                <div class="section-divider mx-auto"></div>
            </div>

            <div class="row g-4">
                @forelse ($ekskuls as $item)
                    <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                        <div class="custom-card text-center">
                            @if(isset($item->foto) && $item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" alt="{{ $item->nama_ekskul ?? $item->nama }}" style="height: 180px; object-fit: cover;">
                            @elseif(isset($item->gambar) && $item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->nama_ekskul ?? $item->nama }}" style="height: 180px; object-fit: cover;">
                            @else
                                <img src="https://images.unsplash.com/photo-1511632765486-a01980e01a18?q=80&w=600&auto=format&fit=crop" class="card-img-top" alt="Default Ekskul" style="height: 180px; object-fit: cover;">
                            @endif
                            <div class="card-body p-3">
                                <h6 class="fw-bold text-dark mb-1" style="font-family: var(--font-heading);">
                                    {{ $item->nama_ekskul ?? $item->nama }}
                                </h6>
                                @if(isset($item->deskripsi) || isset($item->keterangan))
                                    <p class="text-muted small mb-0">{{ Str::limit($item->deskripsi ?? $item->keterangan, 60) }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted py-4" data-aos="fade-up">Belum ada data ekstrakurikuler.</div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Tenaga Pendidik -->
    <section id="guru" class="py-5 bg-light">
        <div class="container py-4">
            <div class="d-flex flex-wrap justify-content-between align-items-end mb-4" data-aos="fade-up">
                <div>
                    <span class="section-tag">Pengajar Berdedikasi</span>
                    <h2 class="section-title mb-0">Guru & Tenaga Kependidikan</h2>
                </div>
                <a href="#" class="btn btn-outline-navy mt-3 mt-md-0">Direktori Lengkap Guru</a>
            </div>
            <div class="section-divider" data-aos="fade-up"></div>

            <div class="row g-4">
                @forelse ($gurus as $item)
                    <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="teacher-card">
                            <div class="teacher-avatar">
                                @if(isset($item->foto) && $item->foto)
                                    <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}" style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                    <i class="fas fa-user-graduate"></i>
                                @endif
                            </div>
                            <h6 class="fw-bold mb-1 text-dark fs-6">{{ $item->nama }}</h6>
                            <small class="text-muted">{{ $item->mapel ?? $item->mata_pelajaran ?? 'Pengajar' }}</small>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted py-4" data-aos="fade-up">Belum ada data guru.</div>
                @endforelse
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

    <!-- Footer Utama -->
    <footer class="main-footer">
        <div class="container">
            <div class="row g-4 mb-5">
                <div class="col-lg-4">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <div class="brand-logo-icon" style="width:36px; height:36px; font-size:1rem;">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h5 class="text-white fw-bold mb-0">SMAN 1 YOGYAKARTA</h5>
                    </div>
                    <p class="small text-light opacity-75">
                        SMA Negeri 1 Yogyakarta telah menjadi bagian tak terpisahkan dari perjalanan Kota Yogyakarta sebagai kota pendidikan.
                    </p>
                    <div class="pt-2">
                        <a href="#" class="social-icon-btn"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon-btn"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon-btn"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="social-icon-btn"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>

                <div class="col-6 col-lg-2">
                    <h6 class="footer-title">Tautan Cepat</h6>
                    <ul class="footer-links small">
                        <li><a href="#profil">Profil Sekolah</a></li>
                        <li><a href="#berita">Berita & Agenda</a></li>
                        <li><a href="#prestasi">Prestasi Siswa</a></li>
                        <li><a href="#ekstrakurikuler">Ekstrakurikuler</a></li>
                        <li><a href="#guru">Guru & Staf</a></li>
                    </ul>
                </div>

                <div class="col-6 col-lg-3">
                    <h6 class="footer-title">Layanan Akademik</h6>
                    <ul class="footer-links small">
                        <li><a href="#">Sistem Informasi Keuangan (BOS)</a></li>
                        <li><a href="#">Perpustakaan Digital</a></li>
                        <li><a href="#">Laboratorium Riset & Komputer</a></li>
                        <li><a href="#">Kelas Layanan Cambridge</a></li>
                        <li><a href="#">Survey Kualitas Pelayanan</a></li>
                    </ul>
                </div>

                <div class="col-lg-3">
                    <h6 class="footer-title">Jam Operasional</h6>
                    <p class="small mb-1"><i class="far fa-clock me-2 text-warning"></i> Senin - Kamis: 07.00 - 15.30 WIB</p>
                    <p class="small mb-3"><i class="far fa-clock me-2 text-warning"></i> Jumat: 07.00 - 14.30 WIB</p>
                    <div class="p-3 rounded bg-white bg-opacity-10">
                        <small class="text-warning d-block fw-bold mb-1">Motto Sekolah:</small>
                        <small class="text-light fs-6" style="font-family: var(--font-heading); font-style: italic;">"Teladan Jayamahe - Berjaya di Mana Pun dan Kapan Pun"</small>
                    </div>
                </div>
            </div>

            <div class="border-top border-secondary pt-4 text-center small text-light opacity-75">
                <p class="mb-0">&copy; SMAN 1 Yogyakarta. Seluruh Hak Cipta Dilindungi Undang-Undang.</p>
            </div>
        </div>
    </footer>

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

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AOS Library JS -->
    <script src="{{ asset('aos/aos.css') }}"></script>
    <script src="{{ asset('aos/aos.js') }}"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
    </script>
</body>
</html>
