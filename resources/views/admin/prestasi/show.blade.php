@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="card-title mb-0">Detail Prestasi</h4>
                    <a href="{{ route('admin.prestasi.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fa-solid fa-arrow-left"></i> Kembali
                    </a>
                </div>
                <hr>

                <div class="text-center mb-4">
                    @if($prestasi->foto)
                        <img src="{{ asset('storage/' . $prestasi->foto) }}" class="img-fluid rounded" style="max-height: 280px; object-fit: cover;" alt="Foto Prestasi">
                    @else
                        <img src="{{ asset('images/faces/face8.jpg') }}" class="img-fluid rounded" style="max-height: 180px;" alt="Default Image">
                    @endif
                </div>

                <table class="table table-borderless">
                    <tr>
                        <th style="width: 30%;">Judul Prestasi</th>
                        <td>: <strong>{{ $prestasi->judul }}</strong></td>
                    </tr>
                    <tr>
                        <th>Nama Peraih</th>
                        <td>: {{ $prestasi->nama_peraih }}</td>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <td>: <span class="badge badge-info">{{ $prestasi->kategori }}</span></td>
                    </tr>
                    <tr>
                        <th>Tingkat</th>
                        <td>: <span class="badge badge-success">{{ $prestasi->tingkat }}</span></td>
                    </tr>
                    <tr>
                        <th>Capaian Juara</th>
                        <td>: {{ $prestasi->juara }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Peroleh</th>
                        <td>: {{ \Carbon\Carbon::parse($prestasi->tanggal)->translatedFormat('d F Y') }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>: {{ $prestasi->deskripsi ?? '-' }}</td>
                    </tr>
                </table>

                <div class="mt-4 text-right">
                    <a href="{{ route('admin.prestasi.addEdit', $prestasi->id) }}" class="btn btn-warning text-white">
                        <i class="fa-solid fa-pen-to-square"></i> Edit
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
