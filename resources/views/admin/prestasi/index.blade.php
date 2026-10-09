@extends('layouts.admin')
@section('title', 'Data Prestasi - SMAN 1 Yogyakarta')

@section('content')

<div class="container-fluid py-2">
    <div class="row">
        <div class="col-12">

            <div class="card shadow-sm border-0 rounded-3">

                <!-- HEADER -->
                <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                    <h3 class="mb-0 font-weight-bold text-dark">Data Prestasi</h3>
                    @if(strcasecmp(auth()->user()->role, 'admin') === 0)
                        <a href="{{ route('admin.prestasi.addEdit') }}" class="btn btn-primary font-weight-semibold shadow-sm">
                            <i class="mdi mdi-plus mr-1"></i> Tambah Data Prestasi
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
                                    <th>Judul Lomba / Prestasi</th>
                                    <th>Nama Peraih</th>
                                    <th>Kategori</th>
                                    <th>Tingkat</th>
                                    <th>Juara</th>
                                    <th class="text-center" width="8%">Foto</th>
                                    <th width="20%" class="text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($prestasi as $item)
                                <tr>

                                    <td class="text-muted">{{ $loop->iteration }}</td>

                                    <!-- JUDUL PRESTASI -->
                                    <td>
                                        <div class="font-weight-semibold text-dark">
                                            {{ $item->judul }}
                                        </div>
                                    </td>

                                    <!-- NAMA PERAIH -->
                                    <td>{{ $item->nama_peraih ?? '-' }}</td>

                                    <!-- KATEGORI -->
                                    <td>
                                        <span class="badge bg-info text-white px-3 py-2">
                                            {{ $item->kategori ?? '-' }}
                                        </span>
                                    </td>

                                    <!-- TINGKAT -->
                                    <td>
                                        <span class="badge bg-success text-white px-3 py-2">
                                            {{ $item->tingkat ?? '-' }}
                                        </span>
                                    </td>

                                    <!-- JUARA -->
                                    <td>
                                        <span class="font-weight-bold text-dark">
                                            {{ $item->juara ?? '-' }}
                                        </span>
                                    </td>

                                    <!-- FOTO -->
                                    <td class="text-center">
                                        @if($item->foto)
                                            <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto" class="rounded-circle" width="40" height="40" style="object-fit: cover;">
                                        @else
                                            <div class="bg-secondary text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                <i class="mdi mdi-trophy"></i>
                                            </div>
                                        @endif
                                    </td>

                                    <!-- AKSI -->
                                    <td class="text-center">
                                        <div class="btn-group" role="group">

                                            <!-- Detail Prestasi (Semua User Bisa Akses) -->
                                            <a href="{{ route('admin.prestasi.show', Crypt::encrypt($item->id_prestasi)) }}" class="btn btn-info btn-sm text-white" title="Detail Prestasi">
                                                <i class="mdi mdi-eye"></i> <span class="d-none d-md-inline ml-1">Detail</span>
                                            </a>

                                            @if(strcasecmp(auth()->user()->role, 'admin') === 0)
                                                <!-- Edit Prestasi (Khusus Admin) -->
                                                <a href="{{ route('admin.prestasi.addEdit', Crypt::encrypt($item->id_prestasi)) }}" class="btn btn-warning btn-sm text-dark font-weight-medium" title="Edit Prestasi">
                                                    <i class="mdi mdi-pencil"></i> <span class="d-none d-md-inline ml-1">Edit</span>
                                                </a>

                                                <!-- Hapus Prestasi (Khusus Admin) -->
                                                <form action="{{ route('admin.prestasi.delete', Crypt::encrypt($item->id_prestasi)) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data prestasi ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm font-weight-medium" title="Hapus Prestasi">
                                                        <i class="mdi mdi-trash-can-outline"></i> <span class="d-none d-md-inline ml-1">Hapus</span>
                                                    </button>
                                                </form>
                                            @endif

                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-4">
                                        Belum ada data prestasi.
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
