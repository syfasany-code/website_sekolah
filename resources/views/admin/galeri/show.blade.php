@extends('layouts.admin')

@section('title', 'Detail Galeri')

@section('content')

<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm rounded-lg overflow-hidden">
                <!-- HEADER -->
                <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <a href="{{ route('admin.galeri.index') }}" class="btn btn-icon btn-light btn-sm mr-3" title="Kembali">
                            <i class="mdi mdi-arrow-left"></i>
                        </a>
                        <h5 class="mb-0 font-weight-bold text-dark">Detail Galeri</h5>
                    </div>

                    <a href="{{ route('admin.galeri.addEdit', Crypt::encrypt($galeri->id_galeri)) }}"
                       class="btn btn-warning btn-sm font-weight-semibold shadow-sm">
                        <i class="mdi mdi-pencil mr-1"></i> Edit Data
                    </a>
                </div>

                <!-- BODY -->
                <div class="card-body p-4">

                    <!-- PREVIEW GAMBAR GALERI -->
                    <div class="text-center mb-4 pb-3 border-bottom">
                        <div class="gallery-image-wrapper mb-3">
                            @php
                                $fileFoto = $galeri->gambar ?? $galeri->foto ?? null;
                            @endphp

                            @if (!empty($fileFoto) && file_exists(public_path('storage/galeri/' . $fileFoto)))
                                <img src="{{ asset('storage/galeri/' . $fileFoto) }}"
                                     alt="{{ $galeri->judul }}"
                                     class="rounded shadow-sm border img-fluid"
                                     style="max-height: 350px; width: 100%; object-fit: cover;">
                            @elseif (!empty($fileFoto) && file_exists(public_path('storage/' . $fileFoto)))
                                <img src="{{ asset('storage/' . $fileFoto) }}"
                                     alt="{{ $galeri->judul }}"
                                     class="rounded shadow-sm border img-fluid"
                                     style="max-height: 350px; width: 100%; object-fit: cover;">
                            @else
                                <div class="bg-light text-secondary rounded d-inline-flex flex-column align-items-center justify-content-center shadow-sm p-5 border" style="width: 100%; height: 250px;">
                                    <i class="mdi mdi-image-broken-variant text-muted mb-2" style="font-size: 48px;"></i>
                                    <span class="text-muted">Tidak Ada Foto / Gambar Preview</span>
                                </div>
                            @endif
                        </div>

                        <h4 class="font-weight-bold text-dark mb-1">
                            {{ $galeri->judul }}
                        </h4>

                        @if(isset($galeri->tanggal) || isset($galeri->created_at))
                            <span class="badge badge-light border text-muted px-3 py-2 rounded-pill mt-1">
                                <i class="mdi mdi-calendar-clock mr-1"></i>
                                Diunggah: {{ \Carbon\Carbon::parse($galeri->tanggal ?? $galeri->created_at)->translatedFormat('d F Y') }}
                            </span>
                        @endif
                    </div>

                    <!-- DETAIL INFORMASI GALERI -->
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="p-3 bg-light rounded">
                                <small class="text-muted d-block text-uppercase font-weight-bold mb-1" style="font-size: 11px;">Judul Dokumentasi</small>
                                <span class="font-weight-medium text-dark h6 mb-0">{{ $galeri->judul }}</span>
                            </div>
                        </div>

                        <!-- KETERANGAN / DESKRIPSI FOTO -->
                        <div class="col-md-12 mb-3">
                            <div class="p-3 bg-light rounded">
                                <small class="text-muted d-block text-uppercase font-weight-bold mb-2" style="font-size: 11px;">Keterangan / Deskripsi</small>
                                <p class="text-dark mb-0" style="white-space: pre-line; line-height: 1.6;">
                                    {{ $galeri->keterangan ?? $galeri->deskripsi ?? 'Tidak ada keterangan untuk foto ini.' }}
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
