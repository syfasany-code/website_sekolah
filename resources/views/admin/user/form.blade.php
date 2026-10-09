@extends('layouts.admin')

@section('title', !empty($user->exists) ? 'Edit Pengguna' : 'Tambah Pengguna')

@section('content')
<div class="container-fluid py-4">
    <div class="card shadow-sm max-w-lg mx-auto">
        <div class="card-header bg-white py-3">
            <h4 class="card-title mb-0 font-weight-bold">
                {{ !empty($user->exists) ? 'Edit Pengguna' : 'Tambah Pengguna Baru' }}
            </h4>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('admin.user.save', !empty($user->exists) ? Crypt::encrypt($user->id_user ?? $user->id) : null) }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label font-weight-semibold">Nama Lengkap</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name ?? $user->nama ?? '') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label font-weight-semibold">Username</label>
                    <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username', $user->username ?? '') }}" required>
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label font-weight-semibold">Password {{ !empty($user->exists) ? '(Biarkan kosong jika tidak diubah)' : '' }}</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" {{ !empty($user->exists) ? '' : 'required' }}>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="role" class="form-label font-weight-semibold">Role / Hak Akses</label>
                    <select name="role" id="role" class="form-control @error('role') is-invalid @enderror" required>
                        <option value="admin" {{ old('role', $user->role ?? '') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="operator" {{ old('role', $user->role ?? '') == 'operator' ? 'selected' : '' }}>Operator</option>
                    </select>
                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.user.index') }}" class="btn btn-light">Batal</a>
                    <button type="submit" class="btn btn-primary">
                        {{ !empty($user->exists) ? 'Simpan Perubahan' : 'Tambah Pengguna' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
