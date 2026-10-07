@extends('layouts.admin')

@section('title', !empty($berita) ? 'Edit Berita' : 'Tambah Berita')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 grid-margin stretch-card">
        <div class="card border-0 shadow-sm rounded-lg">

            <!-- HEADER -->
            <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <a href="{{ route('admin.berita.index') }}" class="btn btn-icon btn-light btn-sm mr-3" title="Kembali">
                        <i class="mdi mdi-arrow-left"></i>
                    </a>
                    <h5 class="mb-0 font-weight-bold text-dark">
                        {{ !empty($berita) ? 'Form Edit Berita' : 'Form Tambah Berita Baru' }}
                    </h5>
                </div>
                <span class="badge {{ !empty($berita) ? 'badge-warning text-dark' : 'badge-primary' }} px-3 py-2">
                    {{ !empty($berita) ? 'Mode Edit' : 'Mode Tambah' }}
                </span>
            </div>

            <!-- FORM BODY -->
            <form action="{{ route('admin.berita.save', !empty($berita) ? Crypt::encrypt($berita->id_berita) : null) }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                @csrf

                <div class="card-body p-4">

                    <!-- JUDUL BERITA -->
                    <div class="form-group mb-4">
                        <label for="judul" class="font-weight-semibold text-dark mb-1">
                            Judul Berita <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light border-right-0"><i class="mdi mdi-newspaper text-muted"></i></span>
                            </div>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $berita->judul ?? '') }}" placeholder="Masukkan judul berita" required>
                        </div>
                        @error('judul')
                            <small class="text-danger mt-1 d-block">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- TANGGAL -->
                    <div class="form-group mb-4">
                        <label for="tanggal" class="font-weight-semibold text-dark mb-1">
                            Tanggal Publis <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light border-right-0"><i class="mdi mdi-calendar text-muted"></i></span>
                            </div>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal', $berita->tanggal ?? date('Y-m-d')) }}" required>
                        </div>
                        @error('tanggal')
                            <small class="text-danger mt-1 d-block">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- ISI BERITA -->
                    <div class="form-group mb-4">
                        <label for="isi" class="font-weight-semibold text-dark mb-1">
                            Isi Berita <span class="text-danger">*</span>
                        </label>
                        <textarea class="form-control @error('isi') is-invalid @enderror" id="isi" name="isi" rows="6" placeholder="Tuliskan isi berita selengkapnya..." required>{{ old('isi', $berita->isi ?? '') }}</textarea>
                        @error('isi')
                            <small class="text-danger mt-1 d-block">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- GAMBAR BERITA -->
                    <div class="form-group mb-2">
                        <label for="gambar" class="font-weight-semibold text-dark mb-1">Gambar / Cover Berita</label>
                        <div class="custom-file mb-2">
                            <input type="file" class="custom-file-input @error('gambar') is-invalid @enderror" id="gambar" name="gambar" accept="image/*" onchange="previewImage(this)">
                            <label class="custom-file-label text-muted" for="gambar">Pilih gambar berita...</label>
                        </div>
                        <small class="text-muted d-block mb-2">Format: JPG, JPEG, PNG (Maks: 2MB). {{ !empty($berita) ? 'Biarkan kosong jika tidak diubah.' : '' }}</small>

                        @error('gambar')
                            <small class="text-danger d-block mb-2">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

                <!-- FOOTER / BUTTONS -->
                <div class="card-footer bg-light border-top py-3 px-4 d-flex justify-content-between align-items-center">
                    <a href="{{ route('admin.berita.index') }}" class="btn btn-light font-weight-medium">
                        <i class="mdi mdi-arrow-left mr-1"></i> Batal
                    </a>
                    <button type="submit" class="btn {{ !empty($berita) ? 'btn-warning text-dark' : 'btn-primary' }} font-weight-semibold shadow-sm">
                        <i class="mdi mdi-content-save-outline mr-1"></i> {{ !empty($berita) ? 'Simpan Perubahan' : 'Simpan Berita' }}
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
