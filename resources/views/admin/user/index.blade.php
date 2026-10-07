@extends('layouts.admin') {{-- Sesuaikan nama layout master kamu --}}

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Kelola Pengguna</h2>
        <a href="{{ route('admin.user.addEdit') }}" class="btn btn-primary">+ Tambah Pengguna</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $index => $item)
                        <tr>
                            <td>{{ $users->firstItem() + $index }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <span class="badge {{ $item->role === 'admin' ? 'bg-danger' : 'bg-info' }}">
                                    {{ ucfirst($item->role) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.user.show', $item->id_user) }}" class="btn btn-sm btn-info text-white">Detail</a>
                                <a href="{{ route('admin.user.addEdit', $item->id_user) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.user.delete', $item->id_user) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data pengguna.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection
