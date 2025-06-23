@extends('layouts.auth')

@section('content')
<div class="row card-login w-100" style="max-width: 900px;">
    <!-- Sisi Kiri -->
    <div class="col-md-6 login-left d-flex flex-column justify-content-center align-items-center text-center">
        <div>
            <h2>Selamat Datang Kembali!</h2>
            <p class="mt-2">Akses koleksi buku digital kami</p>
            <img src="{{ asset('img/bukudigital.webp') }}" alt="Buku Digital" class="img-fluid mt-4" style="max-width: 220px;">
        </div>
    </div>

    <!-- Sisi Kanan (Form Login) -->
    <div class="col-md-6 login-form">
        <div class="text-center mb-4">
            <img src="{{ asset('img/mobile-password-forgot.png') }}" alt="Login Icon" style="width: 80px; height: auto;">
            <h4 class="mt-3">Login ke Akun Anda</h4>
        </div>

        <!-- ✅ Error Login Umum (misalnya email/password salah) -->
        @if ($errors->any())
            <div class="alert alert-danger text-center small">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- ✅ Pesan Status (sukses reset password atau lainnya) -->
        @if (session('status'))
            <div class="alert alert-success text-center small">
                {{ session('status') }}
            </div>
        @endif

        <!-- ✅ Form Login -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" class="form-control" type="password" name="password" required>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Ingat Saya</label>
            </div>

            <!-- Lupa Password -->
            <div class="mb-3 text-end">
                @if (Route::has('password.request'))
                    <a class="text-decoration-none small" href="{{ route('password.request') }}">
                        Lupa password?
                    </a>
                @endif
            </div>

            <!-- Tombol Login -->
            <button type="submit" class="btn btn-primary w-100">
                Login
            </button>
        </form>
    </div>
</div>
@endsection
