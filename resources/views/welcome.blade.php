@extends('layouts.welcome')

@section('content')
    <div class="card-glass">
        <div class="heading-icon mb-3">
            <img src="{{ asset('img/book.png') }}" alt="Icon Daya" style="width: 100px; height: auto;">
        </div>
        <h1 class="fw-bold mb-2">Selamat Datang di Perpustakaan</h1>
        <div class="divider"></div>
        <p class="text-muted mb-4">Jelajahi koleksi buku digital kami dengan mudah dan cepat.</p>

        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-modern btn-primary me-2">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-modern btn-outline-primary me-2">Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-modern btn-primary">Register</a>
                @endif
            @endauth
        @endif
    </div>
@endsection
