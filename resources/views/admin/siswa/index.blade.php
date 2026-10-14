@extends('layouts.admin')
@section('title', 'Data Siswa - SMA 1 Yogyakarta')

@section('content')

<div class="container-fluid py-2">
    <div class="row">
        <div class="col-12">

            <div class="card shadow-sm border-0 rounded-3">

                <!-- HEADER -->
                <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                    <h3 class="mb-0 font-weight-bold text-dark">Data Siswa</h3>
                    @if(strcasecmp(auth()->user()->role, 'admin') === 0)
                        <a href="{{ route('admin.siswa.addEdit') }}" class="btn btn-primary font-weight-semibold shadow-sm">
                            <i class="mdi mdi-plus mr-1"></i> Tambah Data Siswa
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
                                    <th>Nama Siswa</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Kelas</th>
                                    <th>Tahun Masuk</th>
                                    <th width="20%" class="text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($siswa as $item)
                                <tr>

                                    <td class="text-muted">{{ $loop->iteration }}</td>

                                    <!-- NAMA -->
                                    <td>
                                        <div class="font-weight-semibold text-dark">
                                            {{ $item->nama_siswa ?? $item->nama }}
                                        </div>
                                    </td>

                                    <!-- JENIS KELAMIN -->
                                    <td>
                                        <span class="badge {{ strtolower($item->jenis_kelamin) == 'l' || strtolower($item->jenis_kelamin) == 'laki-laki' ? 'bg-primary text-white' : 'bg-pink text-white' }} px-3 py-2" style="{{ strtolower($item->jenis_kelamin) != 'l' && strtolower($item->jenis_kelamin) != 'laki-laki' ? 'background-color: #e83e8c;' : '' }}">
                                            {{ $item->jenis_kelamin }}
                                        </span>
                                    </td>

                                    <!-- KELAS (Relasi dari tabel kelas) -->
                                    <td>
                                        <span class="badge bg-info text-white font-weight-medium px-2 py-1">
                                            {{ $item->kelas->nama_kelas ?? ($item->nama_kelas ?? '-') }}
                                        </span>
                                    </td>

                                    <!-- TAHUN MASUK -->
                                    <td class="text-muted">
                                        {{ $item->tahun_masuk ?? '-' }}
                                    </td>

                                    <!-- AKSI -->
                                    <td  class="tect-center">
                                        <div class="btn-aksi-group" role="group">
                                            <a href="{{ route('admin.siswa.show', Crypt::encrypt($item->id_siswa)) }}"class="btn btn-info btn-sm text-white" title="Detail Siswa"aria-label="Detail Siswa">
                                                <i class="mdi mdi-eye"></i> <spanclass="d-none d-md-inline ms-1">Detail</spanclass=>
                                            </a>
                                            <a href="{{ route('admin.siswa.addEdit', Crypt::encrypt($item->id_siswa)) }}"class="btn btn-warning btn-sm text-white" title="Edit Siswa"aria-label="Edit Siswa">
                                                <i class="mdi mdi-pencil"></i> <spanclass="d-none d-md-inline ms-1">Edit</spanclass=>
                                            </a>
                                            <form action="{{ route('admin.siswa.delete', Crypt::encrypt($item->id_siswa)) }}"
                                                method="POST" class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus Siswa"
                                                    aria-label="Hapus Siswa">
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
                                        Belum ada data siswa.
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
