@extends('layouts.admin')

@section('title', !empty($galeri) ? 'Edit Galeri' : 'Tambah Galeri')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 grid-margin stretch-card">
        <div class="card border-0 shadow-sm rounded-lg">

            <!-- HEADER -->
            <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <a href="{{ route('admin.galeri.index') }}" class="btn btn-icon btn-light btn-sm mr-3" title="Kembali">
                        <i class="mdi mdi-arrow-left"></i>
                    </a>
                    <h5 class="mb-0 font-weight-bold text-dark">
                        {{ !empty($galeri) ? 'Form Edit Galeri' : 'Form Tambah Galeri Baru' }}
                    </h5>
                </div>
                <span class="badge {{ !empty($galeri) ? 'badge-warning text-dark' : 'badge-primary' }} px-3 py-2">
                    {{ !empty($galeri) ? 'Mode Edit' : 'Mode Tambah' }}
                </span>
            </div>

            <!-- FORM BODY -->
            <form action="{{ route('admin.galeri.save') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                @csrf

                {{-- Hidden ID untuk Mode Edit --}}
                @if(!empty($galeri))
                    <input type="hidden" name="id" value="{{ $galeri->id_galeri }}">
                @endif

                <div class="card-body p-4">

                    <!-- JUDUL -->
                    <div class="form-group mb-4">
                        <label for="judul" class="font-weight-semibold text-dark mb-1">
                            Judul Galeri <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light border-right-0"><i class="mdi mdi-format-title text-muted"></i></span>
                            </div>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $galeri->judul ?? '') }}" placeholder="Masukkan judul kegiatan atau galeri" required>
                        </div>
                        @error('judul')
                            <small class="text-danger mt-1 d-block">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- TANGGAL -->
                    <div class="form-group mb-4">
                        <label for="tanggal" class="font-weight-semibold text-dark mb-1">
                            Tanggal <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light border-right-0"><i class="mdi mdi-calendar text-muted"></i></span>
                            </div>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal', $galeri->tanggal ?? date('Y-m-d')) }}" required>
                        </div>
                        @error('tanggal')
                            <small class="text-danger mt-1 d-block">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- KETERANGAN -->
                    <div class="form-group mb-4">
                        <label for="keterangan" class="font-weight-semibold text-dark mb-1">Keterangan / Deskripsi</label>
                        <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" rows="4" placeholder="Tuliskan keterangan singkat mengenai gambar/kegiatan ini...">{{ old('keterangan', $galeri->keterangan ?? '') }}</textarea>
                        @error('keterangan')
                            <small class="text-danger mt-1 d-block">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- GAMBAR / FILE -->
                    <div class="form-group mb-2">
                        <label for="file" class="font-weight-semibold text-dark mb-1">File Gambar</label>
                        <div class="custom-file mb-2">
                            <input type="file" class="custom-file-input @error('file') is-invalid @enderror" id="file" name="file" accept="image/*" onchange="previewImage(this)">
                            <label class="custom-file-label text-muted" for="file">Pilih gambar...</label>
                        </div>
                        <small class="text-muted d-block mb-2">Format: JPG, JPEG, PNG (Maks: 2MB). {{ !empty($galeri) ? 'Biarkan kosong jika tidak ingin mengubah gambar.' : '' }}</small>

                        @error('file')
                            <small class="text-danger d-block mb-2">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

                <!-- FOOTER / BUTTONS -->
                <div class="card-footer bg-light border-top py-3 px-4 d-flex justify-content-between align-items-center">
                    <a href="{{ route('admin.galeri.index') }}" class="btn btn-light font-weight-medium">
                        <i class="mdi mdi-arrow-left mr-1"></i> Batal
                    </a>
                    <button type="submit" class="btn {{ !empty($galeri) ? 'btn-warning text-dark' : 'btn-primary' }} font-weight-semibold shadow-sm">
                        <i class="mdi mdi-content-save-outline mr-1"></i> {{ !empty($galeri) ? 'Simpan Perubahan' : 'Simpan Data' }}
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
