@extends('layouts.admin') {{-- Sesuaikan nama layout master kamu --}}

@section('content')
<div class="container-fluid py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h4 class="card-title mb-0">Detail Pengguna</h4>
            <a href="{{ route('admin.user.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <tr>
                    <th width="200">ID Pengguna</th>
                    <td>{{ $user->id }}</td>
                </tr>
                <tr>
                    <th>Nama Lengkap</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Role</th>
                    <td>
                        <span class="badge {{ $user->role === 'admin' ? 'bg-danger' : 'bg-info' }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>Dibuat Pada</th>
                    <td>{{ $user->created_at ? $user->created_at->format('d M Y H:i') : '-' }}</td>
                </tr>
                <tr>
                    <th>Diperbarui Pada</th>
                    <td>{{ $user->updated_at ? $user->updated_at->format('d M Y H:i') : '-' }}</td>
                </tr>
            </table>

            <div class="mt-3">
                <a href="{{ route('admin.user.addEdit', $user->id) }}" class="btn btn-warning">Edit Pengguna</a>
            </div>
        </div>
    </div>
</div>
@endsection
