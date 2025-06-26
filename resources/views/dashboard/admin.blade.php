@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-50">
        <div class="bg-white border border-gray-200 rounded-xl p-8 w-full max-w-xl shadow-md animate-fade-in">
            <h1 class="text-2xl font-semibold text-center text-gray-800 mb-2">Dashboard Admin</h1>
            <p class="text-center text-gray-600 mb-6">Selamat datang, {{ Auth::user()->name }}. Anda login sebagai
                <strong>Admin</strong>.
            </p>



            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Kartu Data Pengguna --}}
                <div
                    class="bg-white border border-purple-300 rounded-xl p-6 shadow-md hover:shadow-lg transition-all duration-300">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="bg-purple-100 p-3 rounded-full">
                            <span class="text-2xl">📚</span>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold text-purple-700">Kelola Buku</h2>
                            <p class="text-sm text-gray-600">Tambah, edit, atau hapus data buku dalam sistem.</p>
                        </div>
                    </div>
                    <a href="{{ route('buku.index') }}"
                        class="bg-blue-600 inline-block bg-gradient-to-r from-purple-500 to-purple-700 text-white px-4 py-2 rounded-md hover:from-purple-600 hover:to-purple-800 transition">
                        Kelola Buku
                    </a>
                </div>

                <div
                    class="bg-white border border-purple-300 rounded-xl p-6 shadow-md hover:shadow-lg transition-all duration-300">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="bg-purple-100 p-3 rounded-full">
                            <span class="text-2xl">👥</span>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold text-purple-700">Data Pengguna</h2>
                            <p class="text-sm text-gray-600">Lihat daftar user yang terdaftar di sistem.</p>
                        </div>
                    </div>
                    <a href="{{ route('users.index') }}"
                        class="bg-purple-600 inline-block bg-gradient-to-r from-purple-500 to-purple-700 text-white px-4 py-2 rounded-md hover:from-purple-600 hover:to-purple-800 transition">
                        Lihat Pengguna
                    </a>
                </div>

                {{-- Kartu Data Peminjaman --}}
                <div
                    class="bg-white border border-indigo-300 rounded-xl p-6 shadow-md hover:shadow-lg transition-all duration-300">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="bg-indigo-100 p-3 rounded-full">
                            <span class="text-2xl">📖</span>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold text-indigo-700">Data Peminjaman</h2>
                            <p class="text-sm text-gray-600">Lihat data user yang meminjam buku.</p>
                        </div>
                    </div>
                    <a href="{{ route('peminjaman.index') }}"
                        class=" bg-red-600 inline-block bg-gradient-to-r from-indigo-500 to-indigo-700 text-white px-4 py-2 rounded-md hover:from-indigo-600 hover:to-indigo-800 transition">
                        Lihat Data Peminjam
                    </a>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
