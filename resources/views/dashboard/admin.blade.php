@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50">
    <div class="bg-white border border-gray-200 rounded-xl p-8 w-full max-w-xl shadow-md animate-fade-in">
        <h1 class="text-2xl font-semibold text-center text-gray-800 mb-2">Dashboard Admin</h1>
        <p class="text-center text-gray-600 mb-6">Selamat datang, {{ Auth::user()->name }}. Anda login sebagai <strong>Admin</strong>.</p>

        <div class="space-y-4">
            <div class="bg-blue-100/50 border border-blue-200 rounded-lg p-4">
                <h2 class="text-lg font-medium text-blue-800 mb-2">📚 Kelola Buku</h2>
                <p class="text-sm text-blue-700 mb-3">Tambah, edit, atau hapus data buku dalam sistem.</p>
                <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Kelola Buku
                </a>
            </div>

            <div class="bg-purple-100/50 border border-purple-200 rounded-lg p-4">
                <h2 class="text-lg font-medium text-purple-800 mb-2">👥 Data Pengguna</h2>
                <p class="text-sm text-purple-700 mb-3">Lihat daftar user yang terdaftar di sistem.</p>
                <a href="#" class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700 transition">
                    Lihat Pengguna
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
