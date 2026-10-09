@extends('layouts.admin')

@section('content')
<div class="container-fluid py-3">
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-header bg-white py-3 border-0">
            <h5 class="fw-bold mb-0 text-primary">
                <i class="fas fa-sliders-h me-2"></i>Edit Profil Sekolah
            </h5>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('admin.profil-sekolah.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row g-3">
                    <!-- Preview Logo & Foto Gedung -->
                    <div class="col-md-6 text-center">
                        <label class="form-label fw-semibold">Logo Sekolah</label>
                        <div class="mb-2">
                            <img src="{{ ($profil && $profil->logo) ? asset('storage/' . $profil->logo) : 'https://via.placeholder.com/100?text=Logo' }}" id="preview-logo" class="rounded-circle border p-1" style="width: 100px; height: 100px; object-fit: contain;">
                        </div>
                        <input type="file" name="logo" class="form-control" onchange="previewImage(event, 'preview-logo')">
                    </div>

                    <div class="col-md-6 text-center">
                        <label class="form-label fw-semibold">Foto Utama / Gedung</label>
                        <div class="mb-2">
                            <img src="{{ ($profil && $profil->foto) ? asset('storage/' . $profil->foto) : 'https://via.placeholder.com/300x100?text=Foto+Gedung' }}" id="preview-foto" class="rounded-3 border" style="width: 100%; height: 100px; object-fit: cover;">
                        </div>
                        <input type="file" name="foto" class="form-control" onchange="previewImage(event, 'preview-foto')">
                    </div>

                    <!-- Inputs -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nama Sekolah</label>
                        <input type="text" name="nama_sekolah" class="form-control rounded-3" value="{{ old('nama_sekolah', $profil->nama_sekolah ?? '') }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Kepala Sekolah</label>
                        <input type="text" name="kepala_sekolah" class="form-control rounded-3" value="{{ old('kepala_sekolah', $profil->kepala_sekolah ?? '') }}" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">NPSN</label>
                        <input type="text" name="npsn" class="form-control rounded-3" value="{{ old('npsn', $profil->npsn ?? '') }}" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Kontak / No. Telp</label>
                        <input type="text" name="kontak" class="form-control rounded-3" value="{{ old('kontak', $profil->kontak ?? '') }}" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Tahun Berdiri</label>
                        <input type="number" name="tahun_berdiri" class="form-control rounded-3" value="{{ old('tahun_berdiri', $profil->tahun_berdiri ?? '') }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Visi & Misi</label>
                        <textarea name="visi_misi" class="form-control rounded-3" rows="4" required>{{ old('visi_misi', $profil->visi_misi ?? '') }}</textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Deskripsi / Ringkasan</label>
                        <textarea name="deskripsi" class="form-control rounded-3" rows="4" required>{{ old('deskripsi', $profil->deskripsi ?? '') }}</textarea>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold">Alamat Lengkap</label>
                        <textarea name="alamat" class="form-control rounded-3" rows="2" required>{{ old('alamat', $profil->alamat ?? '') }}</textarea>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4">
                    <a href="{{ route('admin.profil-sekolah.profil') }}" class="btn btn-light px-4 rounded-3">Batal</a>
                    <button type="submit" class="btn btn-primary px-4 rounded-3">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function previewImage(event, previewId) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById(previewId);
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection
