@extends('layouts.admin')

@section('title', isset($ekskul) ? 'Edit Ekskul' : 'Tambah Ekskul')

@section('content')
<div class="card p-4 shadow-sm">

    <h4>{{ isset($ekskul) ? 'Edit Ekstrakurikuler' : 'Tambah Ekstrakurikuler' }}</h4>

    <form action="{{ route('admin.ekstrakulikuler.save', isset($ekskul) ? Crypt::encrypt($ekskul->id_ekstrakulikuler) : null) }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- NAMA --}}
        <div class="mb-3">
            <label>Nama Ekskul</label>
            <input type="text" name="nama_ekskul" class="form-control"
                value="{{ old('nama_ekskul', $ekskul->nama_ekskul ?? '') }}" required>
        </div>

        {{-- PEMBINA --}}
        <div class="mb-3">
            <label>Pembina</label>
            <input type="text" name="pembina" class="form-control"
                value="{{ old('pembina', $ekskul->pembina ?? '') }}" required>
        </div>

        {{-- JADWAL --}}
        <div class="mb-3">
            <label>Jadwal Latihan</label>
            <input type="text" name="jadwal_latihan" class="form-control"
                value="{{ old('jadwal_latihan', $ekskul->jadwal_latihan ?? '') }}" placeholder="Contoh: Senin & Rabu, 15:00" required>
        </div>

        {{-- DESKRIPSI --}}
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi', $ekskul->deskripsi ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label fw-semibold">{{ isset($ekstrakulikuler) ? 'Gant Gambar Kegiatan' : 'Foto / Gambar Kegiatan'}}</label>
            <input type="file" class="form-control @error('gambar')is-invalid @enderror" id="gambar" name="gambar" accept="image/*">
            <small class="text-muted">Format: JPG, JPEG, PNG (Maks: 2MB). {{ isset($ekskul) ? 'Biarkan kosong jika tidak diubah.' : ''}}</small>
            @error('gambar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            @if (isset($ekskul) && $ekskul->gambar && file_exists(public_path('storage/' . $ekskul->gambar)))
                <div class="mt-2">
                    <small class="text-secondary d-block">Gambar saat ini:</small>
                    <img src="{{ asset('storage/' .$ekskul->gambar) }}" alt="{{ $ekskul->nama_ekskul }}" class="rounded shadow-sm mt-1" style="height: 80px; object-fit: cover;">
                </div>
            @endif
        </div>

        <div class="mt-3 d-flex justify-content-between">
            <a href="{{ route('admin.ekstrakulikuler.index') }}" class="btn btn-secondary">Kembali</a>

            <button class="btn btn-primary">
                {{ isset($ekskul) ? 'Update' : 'Simpan' }}
            </button>
        </div>

    </form>
</div>
@endsection
