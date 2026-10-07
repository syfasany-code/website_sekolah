@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="card-title mb-0" style="font-size: 1.5rem; font-weight: 600;">Data Prestasi</h3>
                    <a href="{{ route('admin.prestasi.addEdit') }}" class="btn btn-primary">
                        <i class="fa-solid fa-plus mr-1"></i> Tambah Prestasi
                    </a>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table id="prestasiTable" class="table table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">No</th>
                                <th>Judul Lomba / Prestasi</th>
                                <th>Nama Peraih</th>
                                <th>Kategori</th>
                                <th>Tingkat</th>
                                <th>Juara</th>
                                <th class="text-center" style="width: 80px;">Foto</th>
                                <th class="text-center" style="width: 220px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($prestasi as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="font-weight-medium">{{ $item->judul }}</td>
                                <td>{{ $item->nama_peraih }}</td>
                                <td>
                                    <span class="badge badge-info">{{ $item->kategori }}</span>
                                </td>
                                <td><span class="badge badge-success">{{ $item->tingkat }}</span></td>
                                <td><strong>{{ $item->juara }}</strong></td>
                                <td class="text-center">
                                    @if($item->foto)
                                        <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto" class="img-avatar">
                                    @else
                                        <img src="{{ asset('images/faces/face8.jpg') }}" alt="Default" class="img-avatar">
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.prestasi.show', $item->id_prestasi) }}" class="btn btn-primary btn-sm px-2">
                                        <i class="fa-solid fa-eye"></i> Detail
                                    </a>
                                    <a href="{{ route('admin.prestasi.addEdit', $item->id_prestasi) }}" class="btn btn-warning btn-sm px-2 text-white">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.prestasi.delete', $item->id_prestasi) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data prestasi ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm px-2">
                                            <i class="fa-solid fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

