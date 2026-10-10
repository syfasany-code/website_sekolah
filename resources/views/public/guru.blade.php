@extends('public.layouts.app')

@section('title', 'Direktori Guru & Tenaga Pendidik')

@section('content')
<div class="container py-5">

    <!-- JUDUL HALAMAN -->
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h2 class="fw-bold text-dark">Direktori Guru & Tenaga Pendidik</h2>
            <p class="text-muted">Mengenal lebih dekat jajaran guru dan staf pengajar kami.</p>
        </div>
    </div>

    <!-- DAFTAR CARD GURU -->
    <div class="row">
        @forelse($guru as $item)
            @php
                $idGuru = $item->id_guru ?? $item->id;
                $namaGuru = $item->nama_guru ?? $item->nama;
            @endphp
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                    <div class="text-center pt-3 bg-light">
                        @if(!empty($item->foto) && Storage::disk('public')->exists($item->foto))
                            <img src="{{ asset('storage/' . $item->foto) }}"
                                 class="card-img-top rounded-circle shadow-sm"
                                 style="width: 130px; height: 130px; object-fit: cover;"
                                 alt="{{ $namaGuru }}">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($namaGuru) }}&background=002147&color=fff"
                                 class="card-img-top rounded-circle shadow-sm"
                                 style="width: 130px; height: 130px; object-fit: cover;"
                                 alt="Avatar Guru">
                        @endif
                    </div>

                    <div class="card-body text-center d-flex flex-column">
                        <h5 class="card-title fw-bold text-dark mb-1">{{ $namaGuru }}</h5>
                        <p class="card-text text-muted small mb-3">{{ $item->jabatan ?? $item->mapel ?? 'Tenaga Pendidik' }}</p>

                        <div class="mt-auto">
                            <a href="{{ route('public.guru.show', $idGuru) }}" class="btn btn-outline-primary btn-sm w-100 rounded-pill">
                                Lihat Profil Lengkap
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <div class="p-4 bg-light rounded-3">
                    <p class="text-muted mb-0">Belum ada data guru yang ditampilkan.</p>
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
