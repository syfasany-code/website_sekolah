@extends('public.layouts.app')

@section('title', 'Detail Guru')

@section('content')
<div class="container py-5">
    <div class="mb-4">
        <a href="{{ route('public.guru', Crypt::encrypt($guru->id_guru)) }}" class="btn btn-light btn-sm shadow-sm rounded-pill px-3">
            <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Direktori Guru
        </a>
    </div>

    @php
        $namaGuru = $guru->nama_guru ?? $guru->nama;
    @endphp

    <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
        <div class="card-body p-4 p-md-5">
            <div class="row align-items-center">
                <div class="col-md-4 text-center mb-4 mb-md-0">
                    @if(!empty($guru->foto))
                        <img src="{{ asset('storage/' . $guru->foto) }}"
                             class="img-fluid rounded-3 shadow"
                             style="max-height: 350px; width: 100%; object-fit: cover;"
                             alt="{{ $namaGuru }}">
                    @else
                        <img src="{{ asset('images/faces/face8.jpg') }}"
                             class="img-fluid rounded-3 shadow"
                             style="max-height: 350px; width: 100%; object-fit: cover;"
                             alt="Default Avatar">
                    @endif
                </div>

                <div class="col-md-8">
                    <span class="badge bg-primary px-3 py-2 rounded-pill mb-2">
                        {{ $guru->jabatan ?? 'Guru / Tenaga Pendidik' }}
                    </span>
                    <h2 class="fw-bold text-dark mb-3">{{ $namaGuru }}</h2>
                    <hr class="my-3">

                    <table class="table table-borderless align-middle">
                        <tbody>
                            <tr>
                                <th style="width: 30%;" class="text-muted">NIP / NUPTK</th>
                                <td>: {{ $guru->nip ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Mata Pelajaran</th>
                                <td>: {{ $guru->mapel ?? $guru->mata_pelajaran ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Pendidikan Terakhir</th>
                                <td>: {{ $guru->pendidikan ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Sertifikasi</th>
                                <td>: {{ $guru->sertifikasi ?? 'Sudah Tersertifikasi' }}</td>
                            </tr>
                        </tbody>
                    </table>

                    @if(!empty($guru->bio) || !empty($guru->deskripsi))
                        <div class="mt-4 p-3 bg-light rounded-3">
                            <h6 class="fw-bold text-dark mb-2">Profil Singkat</h6>
                            <p class="text-muted mb-0" style="white-space: pre-line; line-height: 1.6;">
                                {{ $guru->bio ?? $guru->deskripsi }}
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
