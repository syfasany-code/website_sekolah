@php
    use Illuminate\Support\Facades\Crypt;
@endphp

@extends('layouts.admin')
@section('title', 'Kelola Pengguna - SMAN 1 Yogyakarta')

@section('content')

<div class="container-fluid py-2">
    <div class="row">
        <div class="col-12">

            <div class="card shadow-sm border-0 rounded-3">

                <!-- HEADER -->
                <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                    <h3 class="mb-0 font-weight-bold text-dark">Kelola Pengguna</h3>
                    @if(strcasecmp(auth()->user()->role, 'admin') === 0)
                        <a href="{{ route('admin.user.addEdit') }}" class="btn btn-primary font-weight-semibold shadow-sm">
                            <i class="mdi mdi-plus mr-1"></i> Tambah Pengguna Baru
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
                                    <th>Nama Lengkap</th>
                                    <th>Email / Username</th>
                                    <th>Role / Hak Akses</th>
                                    <th width="20%" class="text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($users as $index => $item)
                                <tr>

                                    <td class="text-muted">{{ $index + 1 }}</td>

                                    <!-- NAMA -->
                                    <td>
                                        <div class="font-weight-semibold text-dark">
                                            {{ $item->name ?? $item->nama ?? '-' }}
                                        </div>
                                    </td>

                                    <!-- EMAIL / USERNAME -->
                                    <td class="text-muted">
                                        {{ $item->email ?? $item->username ?? '-' }}
                                    </td>

                                    <!-- ROLE / BADGE -->
                                    <td>
                                        <span class="badge {{ strtolower($item->role) === 'admin' ? 'bg-danger text-white' : 'bg-info text-white' }} px-3 py-2">
                                            {{ ucfirst($item->role) }}
                                        </span>
                                    </td>

                                    <!-- AKSI -->
                                    <td class="text-center">
                                        <div class="btn-group" role="group">

                                            {{-- Detail Pengguna (Opsional) --}}
                                            @if(Route::has('admin.user.show'))
                                                <a href="{{ route('admin.user.show', Crypt::encrypt($item->id_user ?? $item->id)) }}" class="btn btn-info btn-sm text-white" title="Detail Pengguna">
                                                    <i class="mdi mdi-eye"></i> <span class="d-none d-md-inline ml-1">Detail</span>
                                                </a>
                                            @endif

                                            @if(strcasecmp(auth()->user()->role, 'admin') === 0)
                                                {{-- Tombol Edit --}}
                                                <a href="{{ route('admin.user.addEdit', Crypt::encrypt($item->id_user ?? $item->id)) }}" class="btn btn-warning btn-sm text-dark font-weight-medium" title="Edit Pengguna">
                                                    <i class="mdi mdi-pencil"></i> <span class="d-none d-md-inline ml-1">Edit</span>
                                                </a>

                                                {{-- Tombol Hapus --}}
                                                <form action="{{ route('admin.user.delete', Crypt::encrypt($item->id_user ?? $item->id)) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm font-weight-medium" title="Hapus Pengguna">
                                                        <i class="mdi mdi-trash-can-outline"></i> <span class="d-none d-md-inline ml-1">Hapus</span>
                                                    </button>
                                                </form>
                                            @endif

                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">
                                        Belum ada data pengguna.
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
