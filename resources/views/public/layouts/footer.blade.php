<footer class="main-footer pt-5 pb-4 text-white">
    <div class="container">
        <div class="row g-4 mb-5">
            <!-- Kolom 1: Brand & Profil Dinamis -->
            <div class="col-lg-4 col-md-6">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <!-- Logo Sekolah Berlatar Putih Melingkar -->
                    <div class="logo-wrapper d-flex align-items-center justify-content-center bg-white rounded-circle p-1 shadow-sm"
                        style="width: 45px; height: 45px; overflow: hidden; flex-shrink: 0;">
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
                            <i class="fas fa-graduation-cap text-warning fs-5"></i>
                        @endif
                    </div>

                    <!-- Nama Sekolah Dinamis -->
                    <h5 class="brand-title mb-0 fw-bold text-uppercase">
                        {{ $profil->nama_sekolah ?? 'SMAN 1 YOGYAKARTA' }}
                    </h5>
                </div>

                <!-- Deskripsi / Sejarah Singkat Dinamis -->
                <p class="small text-white-50 lh-lg mb-4">
                    {{ $profil->deskripsi ?? ($profil->sejarah ?? 'SMA Negeri 1 Yogyakarta telah menjadi bagian tak terpisahkan dari perjalanan Kota Yogyakarta sebagai kota pendidikan, mencetak generasi berkarakter dan berprestasi.') }}
                </p>
            </div>

            <!-- Kolom 2: Tautan Cepat -->
            <div class="col-lg-3 col-md-6 offset-lg-1">
                <h6 class="footer-heading mb-4">Tautan Cepat</h6>
                <ul class="list-unstyled footer-links small mb-0">
                    <li><a href="{{ url('/#profil') }}"><i class="fas fa-chevron-right me-2 text-warning opacity-50"></i>Profil Sekolah</a></li>
                    <li><a href="{{ url('/berita') }}"><i class="fas fa-chevron-right me-2 text-warning opacity-50"></i>Berita &amp; Agenda</a></li>
                    <li><a href="{{ url('/#prestasi') }}"><i class="fas fa-chevron-right me-2 text-warning opacity-50"></i>Prestasi Siswa</a></li>
                    <li><a href="{{ url('/ekstrakurikuler') }}"><i class="fas fa-chevron-right me-2 text-warning opacity-50"></i>Ekstrakurikuler</a></li>
                    <li><a href="{{ url('/#guru') }}"><i class="fas fa-chevron-right me-2 text-warning opacity-50"></i>Guru &amp; Staf</a></li>
                    <li><a href="{{ url('/#siswa') }}"><i class="fas fa-chevron-right me-2 text-warning opacity-50"></i>Guru</a></li>
                </ul>
            </div>

            <!-- Kolom 3: Jam Operasional & Motto -->
            <div class="col-lg-4 col-md-12">
                <h6 class="footer-heading mb-4">Jam Operasional</h6>
                <div class="small text-white-50 mb-3 space-y-2">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <i class="far fa-clock text-warning fs-6"></i>
                        <span>Senin – Kamis: <strong>07.00 – 15.30 WIB</strong></span>
                    </div>
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <i class="far fa-clock text-warning fs-6"></i>
                        <span>Jumat: <strong>07.00 – 14.30 WIB</strong></span>
                    </div>
                </div>

                <!-- Motto Box (Glassmorphism) -->
                <div class="motto-card p-3 rounded-3 position-relative overflow-hidden">
                    <div class="motto-badge mb-1">Motto Sekolah</div>
                    <p class="motto-text mb-0">
                        "Teladan Jayamahe — Berjaya di Mana Pun dan Kapan Pun"
                    </p>
                </div>
            </div>
        </div>

        <!-- Garis Pemisah & Copyright Dinamis -->
        <div class="footer-bottom border-top border-secondary border-opacity-25 pt-4 text-center small text-white-50">
            <p class="mb-0">&copy; {{ date('Y') }} {{ $profil->nama_sekolah ?? 'SMAN 1 YOGYAKARTA' }}. Seluruh Hak Cipta Dilindungi Undang-Undang.</p>
        </div>
    </div>
</footer>
