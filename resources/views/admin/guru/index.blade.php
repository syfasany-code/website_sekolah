@extends('layouts.admin')
@section('title', 'Kelola Guru - SMAN 1 Yogyakarta')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="card shadow-sm border-0 rounded-3">

                <!-- HEADER -->
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Guru</h3>
                    @if(strcasecmp(auth()->user()->role, 'admin') === 0)
                        <a href="{{ route('admin.guru.addEdit') }}" class="btn btn-primary mb-3">
                            + Tambah Data Guru
                        </a>
                    @endif
                </div>

                <!-- BODY -->
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered table-striped datatable" style="width:100%">

                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Guru</th>
                                    <th>NIP</th>
                                    <th>Mapel</th>
                                    <th>Foto</th>
                                    @if(Auth::user()->role == 'admin')
                                        <th>Aksi</th>
                                    @endif
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($guru as $index => $item)
                                <tr>

                                    <td class="text-muted">{{ $index + 1 }}</td>

                                    <!-- NAMA -->
                                    <td>
                                        <div class="fw-semibold">
                                            {{ $item->nama_guru }}
                                        </div>
                                    </td>

                                    <!-- NIP -->
                                    <td class="text-muted">
                                        {{ $item->nip }}
                                    </td>

                                    <!-- MAPEL -->
                                    <td>
                                        <span class="badge bg-primary-subtle text-primary px-3 py-2">
                                            {{ $item->mapel }}
                                        </span>
                                    </td>

                                    <!-- FOTO -->
                                    <td>
                                        @if($item->foto)
                                            <img src="{{ asset('storage/' . $item->foto) }}" width="60" class="rounded-circle">
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>

                                    <!-- AKSI (Khusus Admin) -->

                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.guru.show', Crypt::encrypt($item->id_guru)) }}" class="btn btn-info btn-sm text-white" title="Detail Guru" aria-label="Detail Guru">
                                                <i class="mdi mdi-eye"></i> <span class="d-none d-md-inline ms-1">Detail</span>
                                            </a>
                                            @if(strcasecmp(auth()->user()->role, 'admin') === 0)
                                                <a href="{{ route('admin.guru.addEdit', Crypt::encrypt($item->id_guru)) }}" class="btn btn-warning">
                                                    Edit
                                                </a>
                                                <form action="{{ route('admin.guru.delete', Crypt::encrypt($item->id_guru)) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="{{ Auth::user()->role == 'admin' ? 6 : 5 }}" class="text-center text-muted py-4">
                                        Belum ada data guru
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
