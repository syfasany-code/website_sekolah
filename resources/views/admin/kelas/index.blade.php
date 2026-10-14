@extends('layouts.admin')
@section('title', 'Data Kelas - SMA 1 Yogyakarta')
@section('content')
<div class="container-fluid py-2">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0 rounded-3">

                <!-- HEADER -->
                <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                    <h3 class="mb-0 font-weight-bold text-dark">Data Kelas</h3>
                    @if(strcasecmp(auth()->user()->role, 'admin') === 0)
                        <a href="{{ route('admin.kelas.form') }}" class="btn btn-primary font-weight-semibold shadow-sm">
                            <i class="mdi mdi-plus mr-1"></i> Tambah Data Kelas
                        </a>
                    @endif
                </div>

                <!-- BODY -->
                <div class="card-body p-4">

                    <!-- ALERT NOTIFIKASI -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                            <i class="mdi mdi-check-circle mr-1"></i> {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                            <i class="mdi mdi-alert-circle mr-1"></i> {{ session('error') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped datatable align-middle" style="width:100%">
                            <thead class="table-light">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nama Kelas</th>
                                    <th width="20%" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kelas as $item)
                                <tr>
                                    <td class="text-muted">{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="font-weight-semibold text-dark">
                                            {{ $item->nama_kelas }}
                                        </div>
                                    </td>
                                    <td  class="tect-center">
                                        <div class="btn-aksi-group" role="group">
                                            <a href="{{ route('admin.kelas.form', Crypt::encrypt($item->id_kelas)) }}"class="btn btn-warning btn-sm text-white" title="Edit Kelas"aria-label="Edit Kelas">
                                                <i class="mdi mdi-pencil"></i> <spanclass="d-none d-md-inline ms-1">Edit</spanclass=>
                                            </a>
                                            <form action="{{ route('admin.kelas.destroy', Crypt::encrypt($item->id_kelas)) }}"
                                                method="POST" class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus Kelas"
                                                    aria-label="Hapus Kelas">
                                                    <i class="mdi mdi-delete"></i> <span
                                                        class="d-none d-md-inline ms-1">Hapus</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-4">
                                        Belum ada data kelas.
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
