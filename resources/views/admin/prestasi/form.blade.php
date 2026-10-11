@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-11 mx-auto grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ isset($prestasi) ? 'Edit Data Prestasi' : 'Tambah Data Prestasi' }}</h4>

                    <form action="{{ route('admin.prestasi.save', ['id' => $prestasi->id_prestasi ?? null]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="judul">Judul Prestasi / Lomba <span class="text-danger">*</span></label>
                            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                                id="judul" value="{{ old('judul', $prestasi->judul ?? '') }}" required
                                placeholder="Contoh: Juara 1 Olimpiade Matematika">
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_peraih">Nama Peraih / Tim <span class="text-danger">*</span></label>
                                    <input type="text" name="nama_peraih"
                                        class="form-control @error('nama_peraih') is-invalid @enderror" id="nama_peraih"
                                        value="{{ old('nama_peraih', $prestasi->nama_peraih ?? '') }}" required
                                        placeholder="Nama Siswa / Tim">
                                    @error('nama_peraih')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kategori">Kategori <span class="text-danger">*</span></label>
                                    <select name="kategori" class="form-control @error('kategori') is-invalid @enderror"
                                        id="kategori" required>
                                        <option value="">-- Pilih Kategori --</option>
                                        <option value="Akademik"
                                            {{ old('kategori', $prestasi->kategori ?? '') == 'Akademik' ? 'selected' : '' }}>
                                            Akademik</option>
                                        <option value="Non-Akademik"
                                            {{ old('kategori', $prestasi->kategori ?? '') == 'Non-Akademik' ? 'selected' : '' }}>
                                            Non-Akademik</option>
                                        <option value="Seni & Budaya"
                                            {{ old('kategori', $prestasi->kategori ?? '') == 'Seni & Budaya' ? 'selected' : '' }}>
                                            Seni & Budaya</option>
                                        <option value="Olahraga"
                                            {{ old('kategori', $prestasi->kategori ?? '') == 'Olahraga' ? 'selected' : '' }}>
                                            Olahraga</option>
                                    </select>
                                    @error('kategori')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tingkat">Tingkat <span class="text-danger">*</span></label>
                                    <select name="tingkat" class="form-control @error('tingkat') is-invalid @enderror"
                                        id="tingkat" required>
                                        <option value="">-- Pilih Tingkat --</option>
                                        <option value="Kota/Kabupaten"
                                            {{ old('tingkat', $prestasi->tingkat ?? '') == 'Kota/Kabupaten' ? 'selected' : '' }}>
                                            Kota/Kabupaten</option>
                                        <option value="Provinsi"
                                            {{ old('tingkat', $prestasi->tingkat ?? '') == 'Provinsi' ? 'selected' : '' }}>
                                            Provinsi</option>
                                        <option value="Nasional"
                                            {{ old('tingkat', $prestasi->tingkat ?? '') == 'Nasional' ? 'selected' : '' }}>
                                            Nasional</option>
                                        <option value="Internasional"
                                            {{ old('tingkat', $prestasi->tingkat ?? '') == 'Internasional' ? 'selected' : '' }}>
                                            Internasional</option>
                                    </select>
                                    @error('tingkat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="juara">Capaian / Juara <span class="text-danger">*</span></label>
                                    <input type="text" name="juara"
                                        class="form-control @error('juara') is-invalid @enderror" id="juara"
                                        value="{{ old('juara', $prestasi->juara ?? '') }}" required
                                        placeholder="Contoh: Juara 1 / Medali Emas">
                                    @error('juara')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tanggal">Tanggal Peroleh <span class="text-danger">*</span></label>
                                    <input type="date" name="tanggal"
                                        class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                                        value="{{ old('tanggal', $prestasi->tanggal ?? '') }}" required>
                                    @error('tanggal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi / Catatan</label>
                            <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4"
                                placeholder="Keterangan singkat mengenai kompetisi/prestasi...">{{ old('deskripsi', $prestasi->deskripsi ?? '') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="foto">Foto Documentation / Piagam</label>
                            @if (isset($prestasi) && $prestasi->foto)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $prestasi->foto) }}" alt="Foto Prestasi"
                                        style="max-height: 120px; border-radius: 6px;">
                                </div>
                            @endif
                            <input type="file" name="foto"
                                class="form-control-file @error('foto') is-invalid @enderror" id="foto">
                            <small class="form-text text-muted">Format: JPG, JPEG, PNG (Maks: 2MB)</small>
                            @error('foto')
                                <div class="text-danger mt-1" style="font-size: 80%;">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                        <a href="{{ route('admin.prestasi.index') }}" class="btn btn-light">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
