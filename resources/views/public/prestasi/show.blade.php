@extends('public.layouts.app')

@section('title', $prestasi->judul ?? 'Detail Prestasi')

@section('content')
<div class="container py-5">
    <div class="mb-4">
        <a href="{{ route('public.prestasi') }}" class="btn btn-outline-navy btn-sm shadow-sm rounded-pill px-3">
            <i class="fas fa-arrow-left me-1"></i> Kembali ke Daftar Prestasi
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden p-3 p-md-4">
                <div class="card-body">
                    <div class="row gy-4 align-items-center">

                        <div class="col-md-5">
                            @if($prestasi->foto)
                                <img src="{{ asset('storage/' . $prestasi->foto) }}"
                                     class="img-fluid rounded-4 shadow-sm w-100"
                                     style="max-height: 380px; object-fit: cover;"
                                     alt="{{ $prestasi->judul }}">
                            @else
                                <img src="https://images.unsplash.com/photo-1567427017947-545c5f8d16ad?q=80&w=600&auto=format&fit=crop"
                                     class="img-fluid rounded-4 shadow-sm w-100"
                                     style="max-height: 380px; object-fit: cover;"
                                     alt="Default Prestasi">
                            @endif
                        </div>

                        <div class="col-md-7 ps-md-4">
                            <span class="badge bg-danger px-3 py-2 rounded-pill fw-bold mb-3">
                                {{ $prestasi->tingkat ?? 'Nasional' }}
                            </span>

                            <h2 class="fw-bold text-dark mb-4" style="font-family: var(--font-heading);">{{ $prestasi->judul }}</h2>

                            <div class="mb-4">
                                <div class="d-flex align-items-center mb-2">
                                    <div style="width: 150px;" class="fw-bold text-secondary"><i class="fas fa-user me-2 text-primary"></i>Nama Siswa</div>
                                    <div class="text-dark">: {{ $prestasi->nama_peraih ?? '-' }}</div>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div style="width: 150px;" class="fw-bold text-secondary"><i class="fas fa-tag me-2 text-primary"></i>Kategori</div>
                                    <div class="text-dark">: {{ $prestasi->kategori ?? '-' }}</div>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div style="width: 150px;" class="fw-bold text-secondary"><i class="fas fa-trophy me-2 text-warning"></i>Peringkat / Juara</div>
                                    <div class="text-dark">: {{ $prestasi->juara ?? '-' }}</div>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div style="width: 150px;" class="fw-bold text-secondary"><i class="fas fa-calendar me-2 text-primary"></i>Tahun / Tanggal</div>
                                    <div class="text-dark">: {{ $prestasi->tanggal ? \Carbon\Carbon::parse($prestasi->tanggal)->translatedFormat('d F Y') : '-' }}</div>
                                </div>
                            </div>

                            @if($prestasi->deskripsi)
                                <div class="p-3 bg-light rounded-3 border-start border-4 border-primary">
                                    <h6 class="fw-bold text-dark mb-1"><i class="fas fa-info-circle me-1 text-primary"></i> Keterangan Prestasi</h6>
                                    <p class="text-muted small mb-0">{{ $prestasi->deskripsi }}</p>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
