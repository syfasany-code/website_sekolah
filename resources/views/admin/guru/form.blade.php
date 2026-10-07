@extends('layouts.admin')

@section('title', !empty($guru) ? 'Edit Guru' : 'Tambah Guru')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 grid-margin stretch-card">
        <div class="card border-0 shadow-sm rounded-lg">

            <!-- HEADER -->
            <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <a href="{{ route('admin.guru.index') }}" class="btn btn-icon btn-light btn-sm mr-3" title="Kembali">
                        <i class="mdi mdi-arrow-left"></i>
                    </a>
                    <h5 class="mb-0 font-weight-bold text-dark">
                        {{ !empty($guru) ? 'Form Edit Data Guru' : 'Form Tambah Data Guru Baru' }}
                    </h5>
                </div>
                <span class="badge {{ !empty($guru) ? 'badge-warning text-dark' : 'badge-primary' }} px-3 py-2">
                    {{ !empty($guru) ? 'Mode Edit' : 'Mode Tambah' }}
                </span>
            </div>

            <!-- FORM BODY -->
            <form action="{{ route('admin.guru.save', !empty($guru) ? Crypt::encrypt($guru->id_guru) : null) }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                @csrf

                @if(!empty($guru))
                    <input type="hidden" name="id_guru" value="{{ $guru->id_guru }}">
                @endif

                <div class="card-body p-4">

                    <!-- NAMA GURU -->
                    <div class="form-group mb-4">
                        <label for="nama_guru" class="font-weight-semibold text-dark mb-1">
                            Nama Guru <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light border-right-0"><i class="mdi mdi-account-outline text-muted"></i></span>
                            </div>
                            <input type="text" class="form-control @error('nama_guru') is-invalid @enderror" id="nama_guru" name="nama_guru" value="{{ old('nama_guru', $guru->nama_guru ?? '') }}" placeholder="Contoh: Budi Santoso, S.Pd." required>
                        </div>
                        @error('nama_guru')
                            <small class="text-danger mt-1 d-block">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- NIP -->
                    <div class="form-group mb-4">
                        <label for="nip" class="font-weight-semibold text-dark mb-1">
                            NIP <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light border-right-0"><i class="mdi mdi-card-account-details-outline text-muted"></i></span>
                            </div>
                            <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" value="{{ old('nip', $guru->nip ?? '') }}" placeholder="Contoh: 1987654321" required>
                        </div>
                        @error('nip')
                            <small class="text-danger mt-1 d-block">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- MATA PELAJARAN -->
                    <div class="form-group mb-4">
                        <label for="mapel" class="font-weight-semibold text-dark mb-1">
                            Mata Pelajaran <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light border-right-0"><i class="mdi mdi-book-open-page-variant text-muted"></i></span>
                            </div>
                            <input type="text" class="form-control @error('mapel') is-invalid @enderror" id="mapel" name="mapel" value="{{ old('mapel', $guru->mapel ?? '') }}" placeholder="Contoh: Matematika" required>
                        </div>
                        @error('mapel')
                            <small class="text-danger mt-1 d-block">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- FOTO GURU -->
                    <div class="form-group mb-2">
                        <label for="foto" class="font-weight-semibold text-dark mb-1">Foto Guru</label>
                        <div class="custom-file mb-2">
                            <input type="file" class="custom-file-input @error('foto') is-invalid @enderror" id="foto" name="foto" accept="image/*" onchange="previewImage(this)">
                            <label class="custom-file-label text-muted" for="foto">Pilih file foto...</label>
                        </div>
                        <small class="text-muted d-block mb-2">Format: JPG, JPEG, PNG (Maks: 2MB). {{ !empty($guru) ? 'Biarkan kosong jika tidak diubah.' : '' }}</small>

                        @error('foto')
                            <small class="text-danger d-block mb-2">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

                <!-- FOOTER / BUTTONS -->
                <div class="card-footer bg-light border-top py-3 px-4 d-flex justify-content-between align-items-center">
                    <a href="{{ route('admin.guru.index') }}" class="btn btn-light font-weight-medium">
                        <i class="mdi mdi-arrow-left mr-1"></i> Batal
                    </a>
                    <button type="submit" class="btn {{ !empty($guru) ? 'btn-warning text-dark' : 'btn-primary' }} font-weight-semibold shadow-sm">
                        <i class="mdi mdi-content-save-outline mr-1"></i> {{ !empty($guru) ? 'Simpan Perubahan' : 'Simpan Data Guru' }}
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
