@extends('layouts.auth')

@section('title', 'Login Admin - ' . ($profil->nama_sekolah ?? 'SMAN 1 YOGYAKARTA'))

@section('content')

<div class="login-card text-center p-4 shadow-lg rounded-4 bg-white mx-auto" style="max-width: 420px;">

    <!-- WADAH LOGO PROPORSIONAL -->
    <div class="logo-wrapper mx-auto mb-3 d-flex align-items-center justify-content-center"
         style="width: 100px; height: 100px; overflow: hidden;">
        @if (!empty($profil->logo) && Storage::disk('public')->exists('sekolah/' . $profil->logo))
            <img src="{{ asset('storage/sekolah/' . $profil->logo) }}"
                 alt="Logo {{ $profil->nama_sekolah ?? 'Sekolah' }}"
                 class="img-fluid h-100 w-100" style="object-fit: contain;">
        @elseif(!empty($profil->logo) && Storage::disk('public')->exists($profil->logo))
            <img src="{{ asset('storage/' . $profil->logo) }}"
                 alt="Logo {{ $profil->nama_sekolah ?? 'Sekolah' }}"
                 class="img-fluid h-100 w-100" style="object-fit: contain;">
        @elseif(file_exists(public_path('images/sman1.png')))
            <img src="{{ asset('images/sman1.png') }}"
                 alt="Logo Sekolah"
                 class="img-fluid h-100 w-100" style="object-fit: contain;">
        @else
            <i class="fas fa-graduation-cap fa-3x text-warning"></i>
        @endif
    </div>

    <!-- NAMA SEKOLAH & SUBTITLE -->
    <h4 class="login-title mb-1 fw-bold text-uppercase text-dark" style="font-size: 1.25rem;">
        {{ $profil->nama_sekolah ?? 'SMAN 1 YOGYAKARTA' }}
    </h4>
    <p class="text-muted small mb-4">Silakan login untuk melanjutkan</p>

    <!-- ALERT ERROR (JIKA LOGIN GAGAL) -->
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show text-start small py-2 px-3 mb-3" role="alert">
            <i class="fas fa-exclamation-circle me-1"></i> {{ session('error') }}
            <button type="button" class="btn-close py-2" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- FORM LOGIN -->
    <form method="POST" action="{{ route('proses.login') }}">
        @csrf

        <div class="mb-3 text-start">
            <label class="form-label small fw-semibold text-secondary">Username</label>
            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" placeholder="Masukkan username" required autofocus>
            @error('username')
                <div class="invalid-feedback small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 text-start">
            <label class="form-label small fw-semibold text-secondary">Password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password" required>
            @error('password')
                <div class="invalid-feedback small">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-navy btn-login w-100 mt-2 py-2 fw-bold">
            Login
        </button>
    </form>

</div>

@endsection
