@extends('layouts.admin')

@section('title', isset($siswa->id_siswa) ? 'Edit Siswa' : 'Tambah Siswa')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-11 grid-margin stretch-card">
            <div class="card border-0 shadow-sm rounded-lg">

                <!-- HEADER -->
                <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 font-weight-bold text-dark">
                            {{ isset($siswa->id_siswa) ? 'Form Edit Data Siswa' : 'Form Tambah Data Siswa Baru' }}
                        </h5>
                    </div>
                    <span
                        class="badge {{ isset($siswa->id_siswa) ? 'badge-warning text-dark' : 'badge-primary' }} px-3 py-2">
                        {{ isset($siswa->id_siswa) ? 'Mode Edit' : 'Mode Tambah' }}
                    </span>
                </div>

                <!-- FORM BODY -->
                <!-- Action Route otomatis menyesuaikan parameter jika mode Edit/Tambah -->
                <form
                    action="{{ route('admin.siswa.save', isset($siswa->id_siswa) ? Crypt::encrypt($siswa->id_siswa) : null) }}"
                    method="POST" class="forms-sample">
                    @csrf

                    {{-- Input hidden ID Siswa --}}
                    @if (isset($siswa->id_siswa))
                        <input type="hidden" name="id_siswa" value="{{ $siswa->id_siswa }}">
                    @endif

                    <div class="card-body p-4">

                        <!-- NISN -->
                        <div class="form-group mb-4">
                            <label for="nisn" class="font-weight-semibold text-dark mb-1">
                                NISN <span class="text-muted font-weight-normal">(10 Digit Angka)</span> <span
                                    class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right-0"><i
                                            class="mdi mdi-card-account-details-outline text-muted"></i></span>
                                </div>
                                <input type="text" class="form-control @error('nisn') is-invalid @enderror"
                                    id="nisn" name="nisn" value="{{ old('nisn', $siswa->nisn ?? '') }}"
                                    placeholder="Masukkan 10 digit NISN" required>
                            </div>
                            @error('nisn')
                                <small class="text-danger mt-1 d-block">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="nama_siswa" class="font-weight-semibold text-dark mb-1">
                                Nama Lengkap Siswa <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right-0"><i
                                            class="mdi mdi-account-outline text-muted"></i></span>
                                </div>
                                <input type="text" maxlength="30"
                                    class="form-control @error('nama_siswa') is-invalid @enderror" id="nama_siswa"
                                    name="nama_siswa" value="{{ old('nama_siswa', $siswa->nama_siswa ?? '') }}"
                                    placeholder="Masukkan nama lengkap siswa" required>
                            </div>
                            @error('nama_siswa')
                                <small class="text-danger mt-1 d-block">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="id_kelas">Kelas <span class="text-danger">*</span></label>

                            <select name="id_kelas" id="id_kelas"
                                class="form-control @error('id_kelas') is-invalid @enderror" required>

                                <option value="">-- Pilih Kelas --</option>

                                @foreach ($kelas as $item)
                                    <option value="{{ $item->id_kelas }}"
                                        {{ old('id_kelas', $siswa->id_kelas ?? '') == $item->id_kelas ? 'selected' : '' }}>
                                        {{ $item->nama_kelas }}
                                    </option>
                                @endforeach
                            </select>

                            @error('id_kelas')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="font-weight-semibold text-dark mb-2">
                                Jenis Kelamin <span class="text-danger">*</span>
                            </label>
                            <div class="d-flex align-items-center">
                                <div class="custom-control custom-radio mr-4">
                                    <input type="radio" id="jk_l" name="jenis_kelamin" value="Laki-Laki"
                                        class="custom-control-input @error('jenis_kelamin') is-invalid @enderror"
                                        {{ old('jenis_kelamin', $siswa->jenis_kelamin ?? 'Laki-Laki') == 'Laki-Laki' ? 'checked' : '' }}
                                        required>
                                    <label class="custom-control-label font-weight-medium" for="jk_l">
                                        <i class="mdi mdi-gender-male text-primary mr-1"></i> Laki-Laki
                                    </label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="jk_p" name="jenis_kelamin" value="Perempuan"
                                        class="custom-control-input @error('jenis_kelamin') is-invalid @enderror"
                                        {{ old('jenis_kelamin', $siswa->jenis_kelamin ?? '') == 'Perempuan' ? 'checked' : '' }}
                                        required>
                                    <label class="custom-control-label font-weight-medium" for="jk_p">
                                        <i class="mdi mdi-gender-female text-danger mr-1"></i> Perempuan
                                    </label>
                                </div>
                            </div>
                            @error('jenis_kelamin')
                                <small class="text-danger mt-1 d-block">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- TAHUN MASUK -->
                        <div class="form-group mb-2">
                            <label for="tahun_masuk" class="font-weight-semibold text-dark mb-1">
                                Tahun Masuk / Angkatan <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right-0"><i
                                            class="mdi mdi-calendar-range text-muted"></i></span>
                                </div>
                                <input type="number" class="form-control @error('tahun_masuk') is-invalid @enderror"
                                    id="tahun_masuk" name="tahun_masuk"
                                    value="{{ old('tahun_masuk', $siswa->tahun_masuk ?? date('Y')) }}"
                                    placeholder="Contoh: 2024" required>
                            </div>
                            @error('tahun_masuk')
                                <small class="text-danger mt-1 d-block">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>

                    <!-- FOOTER / BUTTONS -->
                    <div
                        class="card-footer bg-light border-top py-3 px-4 d-flex justify-content-between align-items-center">
                        <a href="{{ route('admin.siswa.index') }}" class="btn btn-light font-weight-medium">
                            <i class="mdi mdi-arrow-left mr-1"></i> Batal
                        </a>
                        <button type="submit"
                            class="btn {{ isset($siswa->id_siswa) ? 'btn-warning text-dark' : 'btn-primary' }} font-weight-semibold shadow-sm">
                            <i class="mdi mdi-content-save-outline mr-1"></i>
                            {{ isset($siswa->id_siswa) ? 'Simpan Perubahan' : 'Simpan Data Siswa' }}
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
