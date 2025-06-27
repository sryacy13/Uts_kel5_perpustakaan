@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">

    {{-- Welcome Message --}}
    <div class="bg-blue-100 text-blue-800 px-6 py-4 rounded mb-8 shadow text-xl font-semibold">
        👋 Selamat datang, <strong>Admin</strong>! Anda login sebagai <strong>Administrator</strong>.
    </div>

    {{-- Filter Bulan --}}
    <div class="mb-10">
        <label for="bulan" class="block text-lg font-semibold text-gray-700 mb-2">📅 Filter Bulan</label>
        <select id="bulan" name="bulan" class="border border-gray-300 rounded-lg px-4 py-3 w-full max-w-xs text-base focus:outline-none focus:ring-2 focus:ring-blue-500">
            @foreach(['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'] as $bulan)
                <option>{{ $bulan }}</option>
            @endforeach
        </select>
    </div>

    {{-- Statistik Card --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
        <div class="bg-blue-600 text-white rounded-2xl p-8 shadow-xl flex flex-col justify-between min-h-[160px]">
            <div class="text-xl font-semibold mb-3">📚 Total Buku</div>
            <div class="text-5xl font-bold">{{ $totalBuku }}</div>
        </div>

        <div class="bg-green-600 text-white rounded-2xl p-8 shadow-xl flex flex-col justify-between min-h-[160px]">
            <div class="text-xl font-semibold mb-3">📥 Total Peminjam</div>
            <div class="text-5xl font-bold">{{ $totalPeminjam }}</div>
        </div>

        <div class="bg-yellow-500 text-white rounded-2xl p-8 shadow-xl flex flex-col justify-between min-h-[160px]">
            <div class="text-xl font-semibold mb-3">👥 Total Anggota</div>
            <div class="text-5xl font-bold">{{ $totalAnggota }}</div>
        </div>

        <div class="bg-red-500 text-white rounded-2xl p-8 shadow-xl flex flex-col justify-between min-h-[160px]">
            <div class="text-xl font-semibold mb-3">👀 Pengunjung Hari Ini</div>
            <div class="text-5xl font-bold">{{ $pengunjungHariIni }}</div>
        </div>
    </div>

   {{-- Grafik Placeholder --}}
<div class="bg-white border-4 border-dashed border-gray-300 rounded-2xl shadow p-8 text-center text-gray-400 text-xl italic">
    📊 Grafik Statistik Pengunjung (Coming Soon)
</div>

{{-- Tambahan di bawah grafik --}}
<div class="mt-6 text-center text-sm text-gray-600">
    💡 Fitur grafik ini akan menampilkan tren kunjungan, peminjaman, dan aktivitas anggota setiap bulan.
    <br>
    Pantau statistik harian & bulanan untuk mengoptimalkan pengelolaan perpustakaan.
</div>


</div>
@endsection
