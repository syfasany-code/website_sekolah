@extends('layouts.admin')

@section('title', 'Detail Prestasi')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-lg overflow-hidden">
                <!-- HEADER -->
                <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <a href="{{ route('admin.prestasi.index') }}" class="btn btn-icon btn-light btn-sm mr-3" title="Kembali">
                            <i class="mdi mdi-arrow-left"></i>
                        </a>
                        <h5 class="mb-0 font-weight-bold text-dark">Detail Prestasi</h5>
                    </div>
                </div>

                <!-- BODY -->
                <div class="card-body p-4">

                    <!-- PREVIEW FOTO PRESTASI -->
                    <div class="text-center mb-4 pb-3 border-bottom">
                        <div class="gallery-image-wrapper mb-3">
                            @if (!empty($prestasi->foto) && Storage::disk('public')->exists($prestasi->foto))
                                <img src="{{ asset('storage/' . $prestasi->foto) }}"
                                     alt="{{ $prestasi->judul }}"
                                     class="rounded shadow-sm border img-fluid"
                                     style="max-height: 350px; width: 100%; object-fit: cover;">
                            @else
                                <div class="bg-light text-secondary rounded d-inline-flex flex-column align-items-center justify-content-center shadow-sm p-5 border" style="width: 100%; height: 250px;">
                                    <i class="mdi mdi-trophy-outline text-muted mb-2" style="font-size: 48px;"></i>
                                    <span class="text-muted">Tidak Ada Foto / Dokumentasi Prestasi</span>
                                </div>
                            @endif
                        </div>

                        <h4 class="font-weight-bold text-dark mb-1">
                            {{ $prestasi->judul }}
                        </h4>

                        @if($prestasi->tanggal)
                            <span class="badge badge-light border text-muted px-3 py-2 rounded-pill mt-1">
                                <i class="mdi mdi-calendar-clock mr-1"></i>
                                Tanggal Peroleh: {{ \Carbon\Carbon::parse($prestasi->tanggal)->translatedFormat('d F Y') }}
                            </span>
                        @endif
                    </div>

                    <!-- DETAIL INFORMASI PRESTASI -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="p-3 bg-light rounded">
                                <small class="text-muted d-block text-uppercase font-weight-bold mb-1" style="font-size: 11px;">Nama Peraih</small>
                                <span class="font-weight-medium text-dark h6 mb-0">{{ $prestasi->nama_peraih ?? '-' }}</span>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="p-3 bg-light rounded">
                                <small class="text-muted d-block text-uppercase font-weight-bold mb-1" style="font-size: 11px;">Kategori</small>
                                <span class="badge badge-info bg-info text-white px-2 py-1">{{ $prestasi->kategori ?? '-' }}</span>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="p-3 bg-light rounded">
                                <small class="text-muted d-block text-uppercase font-weight-bold mb-1" style="font-size: 11px;">Tingkat</small>
                                <span class="badge badge-success bg-success text-white px-2 py-1">{{ $prestasi->tingkat ?? '-' }}</span>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="p-3 bg-light rounded">
                                <small class="text-muted d-block text-uppercase font-weight-bold mb-1" style="font-size: 11px;">Capaian / Juara</small>
                                <span class="font-weight-bold text-dark h6 mb-0">{{ $prestasi->juara ?? '-' }}</span>
                            </div>
                        </div>

                        <!-- DESKRIPSI -->
                        <div class="col-md-12 mb-3">
                            <div class="p-3 bg-light rounded">
                                <small class="text-muted d-block text-uppercase font-weight-bold mb-2" style="font-size: 11px;">Deskripsi / Catatan</small>
                                <p class="text-dark mb-0" style="white-space: pre-line; line-height: 1.6;">
                                    {{ $prestasi->deskripsi ?? 'Tidak ada deskripsi untuk prestasi ini.' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- TOMBOL AKSI -->
                    <div class="mt-4 d-flex justify-content-end">
                        <a href="{{ route('admin.prestasi.addEdit', Crypt::encrypt($prestasi->id_prestasi)) }}" class="btn btn-warning text-white">
                            <i class="mdi mdi-pencil mr-1"></i> Edit Prestasi
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
