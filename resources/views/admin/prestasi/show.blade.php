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
                    @if($prestasi->foto && Storage::disk('public')->exists($prestasi->foto))
                        <img src="{{ asset('storage/' . $prestasi->foto) }}" class="img-fluid rounded shadow-sm" style="max-height: 280px; object-fit: cover;" alt="Foto Prestasi">
                    @else
                        <img src="{{ asset('images/faces/face8.jpg') }}" class="img-fluid rounded shadow-sm" style="max-height: 180px;" alt="Default Image">
                    @endif
                </div>

                <div class="table-responsive">
                    <table class="table table-borderless align-middle">
                        <tr>
                            <th style="width: 25%;">Judul Prestasi</th>
                            <td style="width: 5%;">:</td>
                            <td><strong>{{ $prestasi->judul }}</strong></td>
                        </tr>
                        <tr>
                            <th>Nama Peraih</th>
                            <td>:</td>
                            <td>{{ $prestasi->nama_peraih ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td>:</td>
                            <td><span class="badge badge-info bg-info text-white">{{ $prestasi->kategori ?? '-' }}</span></td>
                        </tr>
                        <tr>
                            <th>Tingkat</th>
                            <td>:</td>
                            <td><span class="badge badge-success bg-success text-white">{{ $prestasi->tingkat ?? '-' }}</span></td>
                        </tr>
                        <tr>
                            <th>Capaian Juara</th>
                            <td>:</td>
                            <td>{{ $prestasi->juara ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Peroleh</th>
                            <td>:</td>
                            <td>
                                {{ $prestasi->tanggal ? \Carbon\Carbon::parse($prestasi->tanggal)->translatedFormat('d F Y') : '-' }}
                            </td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>:</td>
                            <td>{{ $prestasi->deskripsi ?? '-' }}</td>
                        </tr>
                    </table>
                </div>

                <div class="mt-4 d-flex justify-content-end">
                    <a href="{{ route('admin.prestasi.addEdit', $prestasi->id) }}" class="btn btn-warning text-white">
                        <i class="fa-solid fa-pen-to-square me-1"></i> Edit
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
