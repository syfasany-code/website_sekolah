@extends('layouts.admin')
@section('title', 'Data Siswa - MTsN 10 Tasikmalaya')
@section('content')


<div class="card shadow-sm border-0 rounded-3">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Siswa</h5>
        @if(strcasecmp(auth()->user()->role, 'admin') === 0)
            <a href="{{ route('admin.siswa.addEdit') }}" class="btn btn-primary">
                + Tambah Siswa
            </a>
        @endif
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tahun Masuk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="fw-semibold">{{ $item->nama_siswa }}</td>
                        <td>
                            <span class="badge bg-info text-dark">
                                {{ $item->jenis_kelamin }}
                            </span>
                        </td>
                        <td>{{ $item->tahun_masuk }}</td>
                        <td  class="tect-center">
                            <div class="btn-aksi-group" role="group">
                                <a href="{{ route('admin.siswa.show', Crypt::encrypt($item->id_siswa)) }}"class="btn btn-info btn-sm text-white" title="Detail Siswa"aria-label="Detail Siswa">
                                    <i class="mdi mdi-eye"></i> <spanclass="d-none d-md-inline ms-1">Detail</spanclass=>
                                </a>
                                @if(strcasecmp(auth()->user()->role, 'admin') === 0)
                                    <a href="{{ route('admin.siswa.addEdit', $item->id) }}" class="btn btn-sm btn-warning">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.siswa.delete', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data siswa ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
