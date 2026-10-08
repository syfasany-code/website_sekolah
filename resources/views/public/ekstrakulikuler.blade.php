@extends('public.layouts.app')

@section('title', 'Ekstrakurikuler & Organisasi')

@section('content')
<div class="container py-5">

    <!-- TOMBOL KEMBALI KE BERANDA -->
    <div class="mb-4">
        <a href="{{ url('/') }}" class="btn btn-outline-navy btn-sm shadow-sm rounded-pill px-3">
            <i class="fas fa-arrow-left me-1"></i> Kembali ke Beranda
        </a>
    </div>

    <!-- JUDUL HALAMAN -->
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h2 class="fw-bold text-dark">Ekstrakurikuler & Organisasi</h2>
            <p class="text-muted">Wadah pengembangan minat, bakat, dan karakter siswa SMAN 1 Yogyakarta.</p>
        </div>
    </div>

    <!-- DAFTAR CARD EKSKUL -->
    <div class="row g-4">
        @forelse($ekskuls as $item)
            @php
                // Mengambil Primary Key secara dinamis agar variabel tidak null/kosong
                $idEkskul = $item->getKey() ?? $item->id_ekstrakulikuler ?? $item->id_ekskul ?? $item->id;
                $namaEkskul = $item->nama_ekskul ?? $item->nama_ekstrakulikuler ?? $item->nama;
                $fotoEkskul = $item->foto ?? $item->gambar ?? null;
            @endphp
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                    @if(!empty($fotoEkskul) && Storage::disk('public')->exists($fotoEkskul))
                        <img src="{{ asset('storage/' . $fotoEkskul) }}"
                             class="card-img-top"
                             style="height: 200px; object-fit: cover;"
                             alt="{{ $namaEkskul }}">
                    @else
                        <img src="https://images.unsplash.com/photo-1511632765486-a01980e01a18?q=80&w=600&auto=format&fit=crop"
                             class="card-img-top"
                             style="height: 200px; object-fit: cover;"
                             alt="Default Ekskul">
                    @endif

                    <div class="card-body p-4 d-flex flex-column">
                        <h5 class="fw-bold text-dark mb-2" style="font-family: var(--font-heading);">
                            {{ $namaEkskul }}
                        </h5>

                        <p class="card-text text-muted small mb-4" style="line-height: 1.6;">
                            {{ Str::limit(strip_tags($item->deskripsi ?? $item->keterangan ?? 'Kegiatan ekstrakurikuler siswa.'), 90) }}
                        </p>

                        <!-- TOMBOL DETAIL EKSKUL -->
                        <div class="mt-auto">
                            <a href="{{ route('public.ekstrakulikuler.show', $idEkskul) }}" class="btn btn-outline-primary btn-sm w-100 rounded-pill fw-semibold">
                                Lihat Lebih Lengkap <i class="fas fa-chevron-right small ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <div class="p-4 bg-light rounded-3">
                    <p class="text-muted mb-0">Belum ada data ekstrakurikuler yang ditampilkan.</p>
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
