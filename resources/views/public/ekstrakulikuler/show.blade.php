@extends('public.layouts.app')

@section('title', $ekstrakulikuler->nama_ekskul ?? 'Detail Ekstrakurikuler')

@section('content')
<div class="container py-5">
    <div class="mb-4">
        <a href="{{ route('public.ekstrakulikuler') }}" class="btn btn-outline-navy btn-sm shadow-sm rounded-pill px-3">
            <i class="fas fa-arrow-left me-1"></i> Kembali ke Ekstrakurikuler
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-body p-4 p-md-5">

                    <h2 class="fw-bold text-dark mb-4 text-center" style="font-family: var(--font-heading);">{{ $ekskul->nama_ekskul }}</h2>

                    @if($ekskul->gambar)
                        <div class="text-center mb-4">
                            <img src="{{ asset('storage/' . $ekskul->gambar) }}"
                                 class="img-fluid rounded-4 shadow-sm w-100"
                                 style="max-height: 420px; object-fit: cover;"
                                 alt="{{ $ekskul->nama_ekskul }}">
                        </div>
                    @endif

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-3 border-start border-4 border-primary">
                                <span class="text-muted small d-block mb-1"><i class="fas fa-user-tie text-primary me-1"></i> Pembina / Pelatih</span>
                                <strong class="text-dark fs-6">{{ $ekskul->pembina ?? '-' }}</strong>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-3 border-start border-4 border-warning">
                                <span class="text-muted small d-block mb-1"><i class="fas fa-clock text-warning me-1"></i> Jadwal Latihan</span>
                                <strong class="text-dark fs-6">{{ $ekskul->jadwal_latihan ?? '-' }}</strong>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div>
                        <h5 class="fw-bold text-dark mb-3"><i class="fas fa-info-circle text-primary me-2"></i>Deskripsi & Kegiatan</h5>
                        <p class="text-muted mb-0" style="white-space: pre-line; line-height: 1.8;">
                            {{ $ekskul->deskripsi ?? 'Belum ada deskripsi untuk ekstrakurikuler ini.' }}
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
