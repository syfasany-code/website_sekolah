@extends('layouts.admin')
@section('title', isset($kelas) ? 'Tambah Kelas - SMA 1 Yogyakarta' : 'Tambah Kelas - SMA 1 Yogyakarta')

@section('content')

<div class="container-fluid py-2">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card shadow-sm border-0 rounded-3">

                <!-- HEADER -->
                <div class="card-header bg-white py-3">
                    <h3 class="mb-0 font-weight-bold text-dark">
                        {{ isset($kelas) ? 'Tambah Data Kelas' : 'Tambah Data Kelas' }}
                    </h3>
                </div>

                <!-- BODY -->
                <div class="card-body p-4">

                    <!-- Form mengarah ke route 'admin.kelas.save'. Jika mode edit, menyertakan parameter encrypt ID -->
                    <form action="{{ isset($kelas->id_kelas) ? route('admin.kelas.save', Crypt::encrypt($kelas->id_kelas)) : route('admin.kelas.save') }}" method="POST">
                        @csrf

                        <!-- INPUT NAMA KELAS -->
                        <div class="form-group mb-3">
                            <label for="nama_kelas" class="font-weight-semibold">Nama Kelas <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror" id="nama_kelas" name="nama_kelas" value="{{ old('nama_kelas', $kelas->nama_kelas ?? '') }}" placeholder="Contoh: VII A, VIII B, dll" required>

                            @error('nama_kelas')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- TOMBOL AKSI -->
                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ route('admin.kelas.index') }}" class="btn btn-secondary mr-2">Kembali</a>
                            <button type="submit" class="btn btn-primary font-weight-semibold">Simpan Data</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection
