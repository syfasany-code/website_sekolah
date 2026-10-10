@extends('public.layouts.app')

@section('title', ($berita->judul ?? 'Detail Berita') . ' - ' . ($profil->nama_sekolah ?? 'SMAN 1 YOGYAKARTA'))

@section('content')
<div class="container py-5">

    <!-- TOMBOL KEMBALI KE LIST BERITA -->
    <div class="mb-4">
        <a href="{{ url('/berita') }}" class="btn btn-outline-navy btn-sm shadow-sm rounded-pill px-3">
            <i class="fas fa-arrow-left me-1"></i> Kembali ke Semua Berita
        </a>
    </div>

    @php
        $judulBerita = $berita->judul ?? 'Detail Berita';
        $fotoBerita = $berita->gambar ?? $berita->foto ?? null;
    @endphp

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-body p-4 p-md-5">

                    <!-- KATEGORI & TANGGAL -->
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="badge bg-primary px-3 py-2 rounded-pill fw-bold">
                            {{ $berita->kategori ?? 'Umum' }}
                        </span>
                        <span class="text-muted small">
                            <i class="far fa-calendar me-1"></i> {{ $berita->created_at ? $berita->created_at->format('d F Y') : '-' }}
                        </span>
                    </div>

                    <!-- JUDUL BERITA -->
                    <h1 class="fw-bold text-dark mb-4" style="font-family: var(--font-heading);">{{ $judulBerita }}</h1>

                    <!-- GAMBAR UTAMA -->
                    <div class="text-center mb-4">
                        @if(!empty($fotoBerita) && Storage::disk('public')->exists('berita/' . $fotoBerita))
                            <img src="{{ asset('storage/berita/' . $fotoBerita) }}"
                                 class="img-fluid rounded-4 shadow-sm w-100"
                                 style="max-height: 480px; object-fit: cover;"
                                 alt="{{ $judulBerita }}">
                        @elseif(!empty($fotoBerita) && Storage::disk('public')->exists($fotoBerita))
                            <img src="{{ asset('storage/' . $fotoBerita) }}"
                                 class="img-fluid rounded-4 shadow-sm w-100"
                                 style="max-height: 480px; object-fit: cover;"
                                 alt="{{ $judulBerita }}">
                        @else
                            <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=600&auto=format&fit=crop"
                                 class="img-fluid rounded-4 shadow-sm w-100"
                                 style="max-height: 480px; object-fit: cover;"
                                 alt="Default Berita">
                        @endif
                    </div>

                    <hr class="my-4">

                    <!-- ISI/KONTEN BERITA -->
                    <div class="text-dark fs-6 leading-relaxed" style="line-height: 1.8; white-space: pre-line;">
                        {!! $berita->konten ?? $berita->isi ?? 'Belum ada konten isi berita.' !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
