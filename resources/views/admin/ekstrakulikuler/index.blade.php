@extends('layouts.admin')
@section('title', 'Kelola Ekstrakurikuler - SMAN 1 Yogyakarta')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Ekstrakurikuler</h3>
                    <a href="{{ route('admin.ekstrakulikuler.addEdit') }}" class="btn btn-primary btn-sm shadow-sm"> + Tambah Ekskul</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped datatable" style="width:100%">

                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Ekskul</th>
                                    <th>Pembina</th>
                                    <th>Jadwal</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($ekskul as $index => $item)
                                <tr>
                                    <td class="text-muted">{{ $index + 1 }}</td>

                                    <td>
                                        <div class="fw-semibold">
                                            {{ $item->nama_ekskul }}
                                        </div>
                                    </td>

                                    <td class="text-muted">{{ $item->pembina }}</td>

                                    <td>
                                        <span class="badge bg-primary-subtle text-primary px-3 py-2">
                                            {{ $item->jadwal_latihan }}
                                        </span>
                                    </td>

                                    <td>
                                        <span class="badge bg-primary-subtle text-primary px-3 py-2">
                                            {{ $item->deskripsi }}
                                        </span>
                                    </td>

                                    <td>
                                        @if($item->gambar)
                                            <img src="{{ asset('storage/' . $item->gambar) }}"
                                                 width="55"
                                                 class="rounded-3 shadow-sm">
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>

                                    <td  class="tect-center">
                                        <div class="btn-aksi-group" role="group">
                                            <a href="{{ route('admin.ekstrakulikuler.show', Crypt::encrypt($item->id_ekstrakulikuler)) }}"class="btn btn-info btn-sm text-white" title="Detail Ekstrakulikuler"aria-label="Detail Ekstrakulikuler">
                                                <i class="mdi mdi-eye"></i> <spanclass="d-none d-md-inline ms-1">Detail</spanclass=>
                                            </a>
                                            <a href="{{ route('admin.ekstrakulikuler.addEdit', Crypt::encrypt($item->id_ekstrakulikuler)) }}"class="btn btn-warning btn-sm text-white" title="Edit Ekstrakulikuler"aria-label="Edit Ekstrakulikuler">
                                                <i class="mdi mdi-pencil"></i> <spanclass="d-none d-md-inline ms-1">Edit</spanclass=>
                                            </a>
                                            <form action="{{ route('admin.ekstrakulikuler.delete', Crypt::encrypt($item->id_ekstrakulikuler)) }}"
                                                method="POST" class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus Ekstrakulikuler"
                                                    aria-label="Hapus Ekstrakulikuler">
                                                    <i class="mdi mdi-delete"></i> <span
                                                        class="d-none d-md-inline ms-1">Hapus</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">
                                        Belum ada data ekstrakurikuler
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
