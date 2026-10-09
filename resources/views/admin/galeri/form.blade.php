@extends('layouts.admin')

@section('title', !empty($galeri) ? 'Edit Galeri' : 'Tambah Galeri')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card border-0 shadow-sm rounded-lg">

                <!-- HEADER -->
                <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 font-weight-bold text-dark">
                            {{ !empty($galeri) ? 'Form Edit Galeri' : 'Form Tambah Galeri Baru' }}
                        </h5>
                    </div>
                    <span class="badge {{ !empty($galeri) ? 'badge-warning text-dark' : 'badge-primary' }} px-3 py-2">
                        {{ !empty($galeri) ? 'Mode Edit' : 'Mode Tambah' }}
                    </span>
                </div>

                <!-- FORM BODY -->
                <div class="card-body">
                    <form action="{{ route('admin.galeri.save') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Hidden ID jika dalam mode edit --}}
                        @if(!empty($galeri))
                            <input type="hidden" name="id" value="{{ $galeri->id_galeri ?? $galeri->id }}">
                        @endif

                        {{-- Judul --}}
                        <div class="mb-3">
                            <label class="form-label font-weight-bold">Judul <span class="text-danger">*</span></label>
                            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                                   value="{{ old('judul', $galeri->judul ?? '') }}" required placeholder="Masukkan judul galeri">
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Kategori --}}
                        <div class="mb-3">
                            <label class="form-label font-weight-bold">Kategori <span class="text-danger">*</span></label>
                            <select name="kategori" id="kategori" class="form-select form-control @error('kategori') is-invalid @enderror" required onchange="toggleKategoriInput()">
                                <option value="foto" {{ old('kategori', $galeri->kategori ?? 'foto') == 'foto' ? 'selected' : '' }}>Foto</option>
                                <option value="video" {{ old('kategori', $galeri->kategori ?? '') == 'video' ? 'selected' : '' }}>Video</option>
                            </select>
                            @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Input File Foto --}}
                        <div class="mb-3" id="input-foto">
                            <label class="form-label font-weight-bold">File Gambar/Foto</label>
                            <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" accept="image/*">
                            @error('file')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            {{-- Preview File Lama saat Edit --}}
                            @if(!empty($galeri) && $galeri->kategori === 'foto' && $galeri->file)
                                <div class="mt-2">
                                    <small class="text-muted d-block mb-1">Foto Saat Ini:</small>
                                    <img src="{{ asset('storage/galeri/' . $galeri->file) }}" alt="Foto Galeri" width="120" class="img-thumbnail rounded">
                                </div>
                            @endif
                        </div>

                        {{-- Input Link Video --}}
                        <div class="mb-3 d-none" id="input-video">
                            <label class="form-label font-weight-bold">Link Video (YouTube/URL)</label>
                            <input type="url" name="link" class="form-control @error('link') is-invalid @enderror"
                                   value="{{ old('link', $galeri->link ?? '') }}" placeholder="https://www.youtube.com/watch?v=...">
                            @error('link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Keterangan --}}
                        <div class="mb-3">
                            <label class="form-label font-weight-bold">Keterangan <span class="text-danger">*</span></label>
                            <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror"
                                      rows="4" required placeholder="Tuliskan deskripsi atau keterangan galeri">{{ old('keterangan', $galeri->keterangan ?? '') }}</textarea>
                            @error('keterangan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Tanggal --}}
                        <div class="mb-4">
                            <label class="form-label font-weight-bold">Tanggal <span class="text-danger">*</span></label>
                            <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror"
                                   value="{{ old('tanggal', $galeri->tanggal ?? date('Y-m-d')) }}" required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- BUTTON ACTION -->
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary mr-2">Batal</a>
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="mdi mdi-content-save"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- SCRIPT SWITCH TOGGLE INPUT -->
    <script>
        function toggleKategoriInput() {
            const kategori = document.getElementById('kategori').value;
            const inputFoto = document.getElementById('input-foto');
            const inputVideo = document.getElementById('input-video');

            if (kategori === 'video') {
                inputVideo.classList.remove('d-none');
                inputFoto.classList.add('d-none');
            } else {
                inputFoto.classList.remove('d-none');
                inputVideo.classList.add('d-none');
            }
        }

        // Jalankan script saat halaman selesai dimuat
        document.addEventListener('DOMContentLoaded', toggleKategoriInput);
    </script>
@endsection
