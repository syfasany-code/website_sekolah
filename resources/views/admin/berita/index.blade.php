@extends('layouts.admin')
@section('title', 'Kelola Berita - SMAN 1 Yogyakarta')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="card shadow-sm border-0 rounded-3">

                <!-- HEADER -->
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Berita</h3>
                    <a href="{{ route('admin.berita.addEdit') }}" class="btn btn-primary btn-sm shadow-sm">
                        + Tambah Berita
                    </a>
                </div>

                <!-- BODY -->
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-hover align-middle text-center">

                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Isi</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Gambar</th>
                                    <th>Penulis</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($berita as $index => $item)
                                <tr>

                                    <td class="text-muted">{{ $index + 1 }}</td>

                                    <!-- JUDUL -->
                                    <td>
                                        <div class="fw-semibold">
                                            {{ $item->judul }}
                                        </div>
                                    </td>

                                    <!-- ISI DIPOTONG -->
                                    <td class="text-muted">
                                        {{ Str::limit($item->isi, 50) }}
                                    </td>

                                    <!-- TANGGAL -->
                                    <td>
                                        <span class="badge bg-primary-subtle text-primary px-3 py-2">
                                            {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                                        </span>
                                    </td>

                                    <!-- STATUS -->
                                    <td>
                                        <span class="badge
                                            {{ $item->status == 'publish' ? 'bg-success' : 'bg-secondary' }}">
                                            {{ ucfirst($item->status) }}
                                        </span>
                                    </td>

                                    <!-- GAMBAR -->
                                    <td>
                                        @if($item->gambar)
                                            <img src="{{ asset('storage/berita/' . $item->gambar) }}"
                                                 width="70"
                                                 class="rounded-3 shadow-sm">
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>

                                    <!-- PENULIS -->
                                    <td>
                                        {{ $item->user->name ?? '-' }}
                                    </td>

                                    <!-- AKSI -->
                                    <td  class="tect-center">
                                        <div class="btn-aksi-group" role="group">
                                            <a href="{{ route('admin.berita.show', Crypt::encrypt($item->id_berita)) }}"class="btn btn-info btn-sm text-white" title="Detail Berita"aria-label="Detail Berita">
                                                <i class="mdi mdi-eye"></i> <spanclass="d-none d-md-inline ms-1">Detail</spanclass=>
                                            </a>
                                            <a href="{{ route('admin.berita.addEdit', Crypt::encrypt($item->id_berita)) }}"class="btn btn-warning btn-sm text-white" title="Edit Berita"aria-label="Edit Berita">
                                                <i class="mdi mdi-pencil"></i> <spanclass="d-none d-md-inline ms-1">Edit</spanclass=>
                                            </a>
                                            <form action="{{ route('admin.berita.delete', Crypt::encrypt($item->id_berita)) }}"
                                                method="POST" class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus Berita"
                                                    aria-label="Hapus Berita">
                                                    <i class="mdi mdi-delete"></i> <span
                                                        class="d-none d-md-inline ms-1">Hapus</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>

                                @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-4">
                                        Belum ada data berita
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>

                        </table>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

@endsection
