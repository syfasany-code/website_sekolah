@extends('layouts.admin')

@section('title', 'Detail Berita')

@section('content')

<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm rounded-lg overflow-hidden">
                <!-- HEADER -->
                <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <a href="{{ route('admin.berita.index') }}" class="btn btn-icon btn-light btn-sm mr-3" title="Kembali">
                            <i class="mdi mdi-arrow-left"></i>
                        </a>
                        <h5 class="mb-0 font-weight-bold text-dark">Detail Berita</h5>
                    </div>

                    <a href="{{ route('admin.berita.addEdit', Crypt::encrypt($berita->id_berita)) }}"
                       class="btn btn-warning btn-sm font-weight-semibold shadow-sm">
                        <i class="mdi mdi-pencil mr-1"></i> Edit Data
                    </a>
                </div>

                <!-- BODY -->
                <div class="card-body p-4">

                    <!-- PREVIEW GAMBAR / COVER BERITA -->
                    <div class="text-center mb-4 pb-3 border-bottom">
                        <div class="berita-image-wrapper mb-3">
                            @if (!empty($berita->gambar) && file_exists(public_path('storage/berita/' . $berita->gambar)))
                                <img src="{{ asset('storage/berita/' . $berita->gambar) }}"
                                     alt="{{ $berita->judul }}"
                                     class="rounded shadow-sm border img-fluid"
                                     style="max-height: 350px; width: 100%; object-fit: cover;">
                            @elseif (!empty($berita->gambar) && file_exists(public_path('storage/' . $berita->gambar)))
                                <img src="{{ asset('storage/' . $berita->gambar) }}"
                                     alt="{{ $berita->judul }}"
                                     class="rounded shadow-sm border img-fluid"
                                     style="max-height: 350px; width: 100%; object-fit: cover;">
                            @else
                                <div class="bg-light text-secondary rounded d-inline-flex flex-column align-items-center justify-content-center shadow-sm p-5 border" style="width: 100%; height: 200px;">
                                    <i class="mdi mdi-newspaper-variant-outline text-muted mb-2" style="font-size: 48px;"></i>
                                    <span class="text-muted">Tidak Ada Gambar Cover</span>
                                </div>
                            @endif
                        </div>

                        <h3 class="font-weight-bold text-dark mb-2">
                            {{ $berita->judul }}
                        </h3>

                        <div class="d-flex justify-content-center align-items-center flex-wrap gap-2">
                            <span class="badge badge-light border text-muted px-3 py-2 rounded-pill mr-2">
                                <i class="mdi mdi-calendar-clock mr-1"></i>
                                Tanggal: {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}
                            </span>
                            @if($berita->user)
                                <span class="badge badge-primary px-3 py-2 rounded-pill">
                                    <i class="mdi mdi-account-edit mr-1"></i> Penulis: {{ $berita->user->name ?? $berita->user->username }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- ISI BERITA -->
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="p-4 bg-light rounded">
                                <small class="text-muted d-block text-uppercase font-weight-bold mb-3" style="font-size: 11px;">Isi Berita Lengkap</small>
                                <div class="text-dark" style="white-space: pre-line; line-height: 1.8; font-size: 15px;">
                                    {{ $berita->isi }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
