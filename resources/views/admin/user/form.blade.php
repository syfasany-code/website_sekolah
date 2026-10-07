@extends('layouts.admin') {{-- Sesuaikan nama layout master kamu --}}

@section('content')
<div class="container-fluid py-4">
    <div class="card shadow-sm max-w-lg">
        <div class="card-header bg-white">
            <h4 class="card-title mb-0">{{ $user->exists ? 'Edit Pengguna' : 'Tambah Pengguna' }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.user.save', $user->id) }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Role / Peran</label>
                    <select name="role" id="role" class="form-select @error('role') is-invalid @enderror" required>
                        <option value="">-- Pilih Role --</option>
                        <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="operator" {{ old('role', $user->role) === 'operator' ? 'selected' : '' }}>Operator</option>
                    </select>
                    @error('role') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password {{ $user->exists ? '(Kosongkan jika tidak ingin diubah)' : '' }}</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" {{ $user->exists ? '' : 'required' }}>
                    @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
