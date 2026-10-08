@extends('public.layouts.app')

@section('title', $galeri->judul ?? 'Detail Galeri')

@section('content')
<div class="container py-5">
    <div class="mb-4">
        <a href="{{ route('public.galeri') }}" class="btn btn-outline-navy btn-sm shadow-sm rounded-pill px-3">
            <i class="fas fa-arrow-left me-1"></i> Kembali ke Galeri
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-body p-4 p-md-5">

                    <div class="mb-3 text-center">
                        <span class="badge bg-primary px-3 py-2 rounded-pill fw-bold mb-2">
                            {{ $galeri->kategori ?? 'Foto' }}
                        </span>
                        <h2 class="fw-bold text-dark" style="font-family: var(--font-heading);">{{ $galeri->judul }}</h2>
                        <span class="text-muted small">
                            <i class="far fa-calendar me-1"></i> {{ $galeri->tanggal ? \Carbon\Carbon::parse($galeri->tanggal)->translatedFormat('d F Y') : '-' }}
                        </span>
                    </div>

                    @if($galeri->file)
                        <div class="text-center my-4">
                            @if(strtolower($galeri->kategori) == 'video')
                                <video controls class="w-100 rounded-4 shadow-sm" style="max-height: 500px;">
                                    <source src="{{ asset('storage/' . $galeri->file) }}" type="video/mp4">
                                    Browser kamu tidak mendukung pemutaran video.
                                </video>
                            @else
                                <img src="{{ asset('storage/' . $galeri->file) }}"
                                     class="img-fluid rounded-4 shadow-sm w-100"
                                     style="max-height: 520px; object-fit: contain; background-color: #f8f9fa;"
                                     alt="{{ $galeri->judul }}">
                            @endif
                        </div>
                    @endif

                    @if($galeri->keterangan)
                        <hr class="my-4">
                        <div class="p-3 bg-light rounded-3">
                            <h6 class="fw-bold text-dark mb-2"><i class="fas fa-info-circle me-2 text-primary"></i>Keterangan Dokumentasi</h6>
                            <p class="text-muted mb-0" style="white-space: pre-line; line-height: 1.7;">
                                {{ $galeri->keterangan }}
                            </p>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
