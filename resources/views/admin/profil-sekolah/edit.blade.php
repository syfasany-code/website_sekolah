@extends('layouts.admin') {{-- Sesuaikan dengan layout admin Anda --}}

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-navy text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold">Edit Profil Sekolah</h5>
        </div>
        <div class="card-body p-4">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('admin.profil-sekolah.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nama Sekolah</label>
                        <input type="text" name="nama_sekolah" class="form-control" value="{{ old('nama_sekolah', $profil->nama_sekolah ?? '') }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Motto Sekolah</label>
                        <input type="text" name="motto" class="form-control" value="{{ old('motto', $profil->motto ?? '') }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Nomor Telepon</label>
                        <input type="text" name="telepon" class="form-control" value="{{ old('telepon', $profil->telepon ?? '') }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Email Resmi</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $profil->email ?? '') }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Alamat Sekolah</label>
                        <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $profil->alamat ?? '') }}">
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold">Sambutan Kepala Sekolah</label>
                        <textarea name="sambutan" class="form-control" rows="4">{{ old('sambutan', $profil->sambutan ?? '') }}</textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Visi</label>
                        <textarea name="visi" class="form-control" rows="3">{{ old('visi', $profil->visi ?? '') }}</textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Misi</label>
                        <textarea name="misi" class="form-control" rows="3">{{ old('misi', $profil->misi ?? '') }}</textarea>
                    </div>

                    <div class="col-12 mt-4 text-end">
                        <button type="submit" class="btn btn-primary px-4 fw-bold">Simpan Perubahan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
