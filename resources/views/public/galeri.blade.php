@extends('public.layouts.app')

@section('title', 'Galeri & Dokumentasi - ' . ($profil->nama_sekolah ?? 'SMA Negeri 1 Yogyakarta'))

@section('content')

    <!-- Header Section -->
    <section class="bg-light py-5 border-bottom">
        <div class="container py-3">
            <div class="text-center">
                <h1 class="fw-bold text-dark display-5 mb-2" style="font-family: var(--font-heading);">
                    Galeri & Dokumentasi Kegiatan
                </h1>
                <p class="text-muted lead fs-6 mb-0">
                    Momen berharga, fasilitas, dan dokumentasi ragam aktivitas {{ $profil->nama_sekolah ?? 'SMA Negeri 1 Yogyakarta' }}.
                </p>
            </div>
        </div>
    </section>

    <!-- Content Galeri Section -->
    <section class="py-5 bg-white">
        <div class="container py-3">
            <div class="row g-4">
                @forelse ($galeris as $item)
                    @php
                        $kategori = strtolower($item->kategori ?? 'foto');
                        $fotoFile = $item->file ?? $item->foto ?? $item->gambar ?? null;
                        $judul    = $item->judul ?? 'Dokumentasi Kegiatan';
                        $tanggal  = $item->created_at ? \Carbon\Carbon::parse($item->created_at)->format('d M Y') : date('d M Y');
                    @endphp

                    <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden custom-gallery-card">
                            <div class="position-relative overflow-hidden style-gallery-card">

                                {{-- KATEGORI FOTO --}}
                                @if($kategori === 'foto')
                                    @if(!empty($fotoFile) && Storage::disk('public')->exists('galeri/' . $fotoFile))
                                        <img src="{{ asset('storage/galeri/' . $fotoFile) }}" class="w-100" alt="{{ $judul }}" style="height: 240px; object-fit: cover;">
                                    @elseif(!empty($fotoFile) && Storage::disk('public')->exists($fotoFile))
                                        <img src="{{ asset('storage/' . $fotoFile) }}" class="w-100" alt="{{ $judul }}" style="height: 240px; object-fit: cover;">
                                    @else
                                        <div class="bg-secondary d-flex align-items-center justify-content-center text-white" style="height: 240px;">
                                            <i class="fas fa-image fa-3x opacity-50"></i>
                                        </div>
                                    @endif

                                {{-- KATEGORI VIDEO --}}
                                @else
                                    <div class="bg-dark d-flex flex-column align-items-center justify-content-center text-white" style="height: 240px;">
                                        <i class="fab fa-youtube text-danger display-4 mb-2"></i>
                                        <span class="badge bg-danger">Video Kegiatan</span>
                                    </div>
                                @endif

                                {{-- Overlay Judul & Tanggal --}}
                                <div class="gallery-overlay p-3 d-flex flex-column justify-content-end">
                                    <small class="text-warning mb-1 fw-semibold">
                                        <i class="far fa-calendar-alt me-1"></i> {{ $tanggal }}
                                    </small>
                                    <h6 class="text-white fw-bold mb-0" style="font-family: var(--font-heading);">
                                        {{ $judul }}
                                    </h6>
                                </div>
                            </div>

                            {{-- Tombol Aksi Dinamis --}}
                            <div class="card-footer bg-white border-0 p-3 text-center">
                                @if($kategori === 'foto')
                                    @php
                                        $urlFoto = !empty($fotoFile) && Storage::disk('public')->exists('galeri/' . $fotoFile)
                                            ? asset('storage/galeri/' . $fotoFile)
                                            : asset('storage/' . $fotoFile);
                                    @endphp
                                    <a href="{{ $urlFoto }}" target="_blank" class="btn btn-outline-primary btn-sm w-100 rounded-pill fw-semibold">
                                        Lihat Foto Lengkap <i class="fas fa-chevron-right ms-1"></i>
                                    </a>
                                @else
                                    <a href="{{ $item->link ?? '#' }}" target="_blank" class="btn btn-outline-danger btn-sm w-100 rounded-pill fw-semibold">
                                        Tonton Video <i class="fab fa-youtube ms-1"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted py-5">
                        <i class="fas fa-images fa-3x mb-3 text-secondary"></i>
                        <p class="fs-5 mb-0">Belum ada dokumentasi galeri kegiatan.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination Jika Ada -->
            @if(method_exists($galeris, 'links'))
                <div class="d-flex justify-content-center mt-5">
                    {{ $galeris->links() }}
                </div>
            @endif
        </div>
    </section>

@endsection

@push('styles')
    <style>
        .custom-gallery-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .custom-gallery-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.12) !important;
        }
        .style-gallery-card {
            position: relative;
        }
        .gallery-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            top: 0;
            background: linear-gradient(to top, rgba(0, 33, 71, 0.88) 0%, rgba(0, 33, 71, 0) 65%);
            opacity: 0.95;
            transition: opacity 0.3s ease;
        }
        .custom-gallery-card:hover .gallery-overlay {
            opacity: 1;
        }
    </style>
@endpush
