@extends('layouts.admin')

@section('title', 'Detail Guru')

@section('content')

<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm rounded-lg overflow-hidden">
                <!-- HEADER -->
                <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <a href="{{ route('admin.guru.index') }}" class="btn btn-icon btn-light btn-sm mr-3" title="Kembali">
                            <i class="mdi mdi-arrow-left"></i>
                        </a>
                        <h5 class="mb-0 font-weight-bold text-dark">Detail Data Guru</h5>
                    </div>

                    <a href="{{ route('admin.guru.addEdit', Crypt::encrypt($guru->id_guru)) }}"
                       class="btn btn-warning btn-sm font-weight-semibold shadow-sm">
                        <i class="mdi mdi-pencil mr-1"></i> Edit Data
                    </a>
                </div>

                <!-- BODY -->
                <div class="card-body p-4">

                    <!-- PROFIL HEADER -->
                    <div class="text-center mb-4 pb-3 border-bottom">
                        <div class="avatar-wrapper mb-3">
                            @if (!empty($guru->foto) && file_exists(public_path('storage/' . $guru->foto)))
                                <img src="{{ asset('storage/' . $guru->foto) }}"
                                     alt="{{ $guru->nama_guru }}"
                                     class="rounded-circle shadow-sm border"
                                     style="width: 90px; height: 90px; object-fit: cover;">
                            @else
                                <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center shadow-sm" style="width: 90px; height: 90px; font-size: 36px;">
                                    <i class="mdi mdi-account-tie"></i>
                                </div>
                            @endif
                        </div>
                        <h4 class="font-weight-bold text-dark mb-1">
                            {{ $guru->nama_guru }}
                        </h4>
                        <span class="badge badge-light border text-muted px-3 py-2 rounded-pill">
                            <i class="mdi mdi-card-account-details-outline mr-1"></i> NIP: {{ $guru->nip }}
                        </span>
                    </div>

                    <!-- DETAIL INFORMASI GURU -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="p-3 bg-light rounded">
                                <small class="text-muted d-block text-uppercase font-weight-bold mb-1" style="font-size: 11px;">NIP</small>
                                <span class="font-weight-medium text-dark h6 mb-0">{{ $guru->nip }}</span>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="p-3 bg-light rounded">
                                <small class="text-muted d-block text-uppercase font-weight-bold mb-1" style="font-size: 11px;">Mata Pelajaran</small>
                                <span class="badge badge-info px-3 py-2 font-weight-medium" style="font-size: 13px;">
                                    <i class="mdi mdi-book-open-page-variant mr-1"></i> {{ $guru->mapel }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="p-3 bg-light rounded d-flex align-items-center justify-content-between">
                                <div>
                                    <small class="text-muted d-block text-uppercase font-weight-bold mb-1" style="font-size: 11px;">Status Foto Profil</small>
                                    <span class="font-weight-medium text-dark mb-0">
                                        @if (!empty($guru->foto))
                                            <i class="mdi mdi-check-circle text-success mr-1"></i> Foto Profil Tersedia
                                        @else
                                            <i class="mdi mdi-alert-circle text-warning mr-1"></i> Belum Mengunggah Foto Profil
                                        @endif
                                    </span>
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
