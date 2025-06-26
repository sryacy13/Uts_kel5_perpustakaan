@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-blue-50">
        <div class="bg-white border border-blue-100 rounded-xl p-8 w-full max-w-xl shadow-md
            animate-fade-in">
            <h1 class="text-2xl font-semibold text-center text-blue-700 mb-2">Dashboard User</h1>
            <p class="text-center text-blue-500 mb-6">
                Halo {{ Auth::user()->name }}, selamat datang di halaman pengguna perpustakaan.
            </p>

            <div class="space-y-4">
                <div class="bg-blue-100/50 border border-blue-200 rounded-lg p-4">
                    <h2 class="text-lg font-medium text-blue-800 mb-2">📚 Koleksi Buku</h2>
                    <p class="text-sm text-blue-700 mb-3">Jelajahi daftar buku yang tersedia.</p>
                    <a href="{{ route('koleksi.index') }}"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                        Lihat Buku
                    </a>
                </div>

                <div class="bg-green-100/50 border border-green-200 rounded-lg p-4">
                    <h2 class="text-lg font-medium text-green-800 mb-2">👤 Profil Saya</h2>
                    <p class="text-sm text-green-700 mb-3">Edit nama, email, dan kata sandi Anda.</p>
                    <a href="{{ route('profile.edit') }}"
                        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                        Kelola Profil
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
