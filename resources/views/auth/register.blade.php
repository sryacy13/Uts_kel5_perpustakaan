@extends('layouts.register')

@section('content')
<div class="row card-register w-100">
    <!-- Kiri -->
    <div class="col-md-6 register-left d-flex flex-column justify-content-center">
        <div>
            <h2>Daftar Sekarang</h2>
            <p>Akses ribuan koleksi buku digital</p>
            <img src="{{ asset('img/bukudigital.webp') }}" alt="Gambar Buku Digital" class="img-fluid mt-3">
        </div>
    </div>

    <!-- Kanan -->
    <div class="col-md-6 register-form">
        <div class="text-center mb-4">
            <img src="{{ asset('img/website.png') }}" alt="Ikon Registrasi" width="80">
        </div>
        <h4 class="mb-4 text-center">Form Registrasi</h4>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nama -->
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus>
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required>
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" class="form-control" type="password" name="password" required>
                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <!-- Konfirmasi Password -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required>
                @error('password_confirmation') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <!-- Tombol dan Link -->
            <div class="d-flex justify-content-between align-items-center mt-4">
                <a href="{{ route('login') }}" class="text-decoration-none">Sudah punya akun?</a>
                <button type="submit" class="btn btn-primary">Daftar</button>
            </div>
        </form>
    </div>
</div>
@endsection
