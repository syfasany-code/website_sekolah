<nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
    <div class="container">
        <!-- Logo & Nama Sekolah Dinamis dari Database -->
        <a class="navbar-brand d-flex align-items-center gap-3" href="{{ url('/') }}">
            <div class="logo-wrapper d-flex align-items-center justify-content-center bg-white rounded-circle p-1 shadow-sm"
                style="width: 50px; height: 50px; overflow: hidden; flex-shrink: 0;">
                @if (!empty($profil->logo) && Storage::disk('public')->exists('sekolah/' . $profil->logo))
                    <img src="{{ asset('storage/sekolah/' . $profil->logo) }}" alt="Logo {{ $profil->nama_sekolah ?? 'Sekolah' }}"
                        class="w-100 h-100 object-fit-contain p-1">
                @elseif(!empty($profil->logo) && Storage::disk('public')->exists($profil->logo))
                    <img src="{{ asset('storage/' . $profil->logo) }}" alt="Logo {{ $profil->nama_sekolah ?? 'Sekolah' }}"
                        class="w-100 h-100 object-fit-contain p-1">
                @elseif(!empty($profil->logo) && file_exists(public_path('images/' . $profil->logo)))
                    <img src="{{ asset('images/' . $profil->logo) }}" alt="Logo {{ $profil->nama_sekolah ?? 'Sekolah' }}"
                        class="w-100 h-100 object-fit-contain p-1">
                @else
                    <i class="fas fa-graduation-cap fa-lg text-warning"></i>
                @endif
            </div>

            <div>
                <h5 class="fw-bold mb-0 text-white text-uppercase" style="letter-spacing: 0.5px; font-size: 1.1rem; line-height: 1.2;">
                    {{ $profil->nama_sekolah ?? 'SMAN 1 YOGYAKARTA' }}
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

        <!-- Menu Navigasi Persis Sesuai Gambar -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                <li class="nav-item">
                    <a class="nav-link active" href="#beranda">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#profil">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#berita">Berita & Informasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#prestasi">Prestasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#ekstrakurikuler">Ekstrakurikuler</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#guru">Guru & Staf</a>
                </li>
                <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                    <a href="#kontak" class="btn btn-gold text-decoration-none fw-semibold px-4 py-2">Hubungi Kami</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
