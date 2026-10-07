 @extends('layouts.auth')

@section('title', 'Login Admin')

@section('content')

<div class="login-card text-center">

    <img src="{{ asset('images/logo-sman1.png') }}" class="logo">

    <h4 class="login-title mb-3">SMAN 1 Yogyakarta</h4>
    <p class="text-muted mb-4">Silakan login untuk melanjutkan</p>

    <form method="POST" action="{{ route('proses.login') }}">
        @csrf

        <div class="mb-3 text-start">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>

        <div class="mb-3 text-start">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-login w-100 mt-2">
            Login
        </button>
    </form>

</div>

@endsection 