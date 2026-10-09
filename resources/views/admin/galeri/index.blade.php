@extends('layouts.admin')
@section('title', 'Kelola Galeri - SMAN 1 Yogyakarta')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card shadow-sm border-0 rounded-3">

                    <!-- HEADER -->
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Galeri</h3>
                        <a href="{{ route('admin.galeri.addEdit') }}" class="btn btn-primary btn-sm shadow-sm">
                            + Tambah Galeri
                        </a>
                    </div>

                    <!-- BODY -->
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-bordered table-striped datatable" style="width:100%">

                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Keterangan</th>
                                        <th>File</th>
                                        <th>Kategori</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($galeri as $index => $item)
                                        <tr>

                                            <td class="text-muted">{{ $index + 1 }}</td>

                                            <td>
                                                <div class="fw-semibold">
                                                    {{ $item->judul }}
                                                </div>
                                            </td>

                                            <td class="text-muted">
                                                {{ $item->keterangan }}
                                            </td>

                                            <!-- FILE (IMAGE / VIDEO) -->
                                            <td>
                                                @if ($item->kategori === 'foto')
                                                    @if ($item->file)
                                                        <img src="{{ asset('storage/galeri/' . $item->file) }}"
                                                            alt="{{ $item->judul }}" width="60" height="60"
                                                            class="rounded object-fit-cover">
                                                    @else
                                                        <span class="text-muted">-</span>
                                                    @endif
                                                @else
                                                    @if ($item->link)
                                                        <a href="{{ $item->link }}" target="_blank"
                                                            class="btn btn-xs btn-outline-danger">
                                                            <i class="mdi mdi-youtube"></i> Tonton
                                                        </a>
                                                    @else
                                                        <span class="text-muted">-</span>
                                                    @endif
                                                @endif
                                            </td>

                                            <td>
                                                <span
                                                    class="badge {{ strtolower($item->kategori) === 'foto' ? 'bg-success' : 'bg-danger' }}">
                                                    {{ ucfirst($item->kategori) }}
                                                </span>
                                            </td>

                                            <!-- TANGGAL -->
                                            <td>
                                                <span class="badge bg-primary-subtle text-primary px-3 py-2">
                                                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                                                </span>
                                            </td>

                                            <!-- AKSI -->
                                            <td class="tect-center">
                                                <div class="btn-aksi-group" role="group">
                                                    <a href="{{ route('admin.galeri.show', Crypt::encrypt($item->id_galeri)) }}"class="btn btn-info btn-sm text-white"
                                                        title="Detail Galeri"aria-label="Detail Galeri">
                                                        <i class="mdi mdi-eye"></i>
                                                        <spanclass="d-none d-md-inline ms-1">Detail</spanclass=>
                                                    </a>
                                                    <a href="{{ route('admin.galeri.addEdit', Crypt::encrypt($item->id_galeri)) }}"class="btn btn-warning btn-sm text-white"
                                                        title="Edit Galeri"aria-label="Edit Galeri">
                                                        <i class="mdi mdi-pencil"></i>
                                                        <spanclass="d-none d-md-inline ms-1">Edit</spanclass=>
                                                    </a>
                                                    <form
                                                        action="{{ route('admin.galeri.delete', Crypt::encrypt($item->id_galeri)) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            title="Hapus Galeri" aria-label="Hapus Galeri">
                                                            <i class="mdi mdi-delete"></i> <span
                                                                class="d-none d-md-inline ms-1">Hapus</span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>

                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-muted py-4">
                                                Belum ada data galeri
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
