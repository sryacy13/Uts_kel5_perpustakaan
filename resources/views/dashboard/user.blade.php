@extends('layouts.app')

@section('content')
<div class="p-6 bg-gray-100 min-h-screen">
    {{-- Welcome Message --}}
    <div class="bg-blue-100 text-blue-800 px-4 py-3 rounded mb-6 shadow-sm">
        Selamat datang, <strong>{{ Auth::user()->name }}</strong>! Anda login sebagai <strong>User</strong>.
    </div>

    {{-- Heading & Form Pencarian --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">📚 Daftar Buku</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                ✅ {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
                <strong>⚠️ Terjadi kesalahan:</strong>
                <ul class="list-disc list-inside mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="GET" action="{{ route('user.dashboard') }}" class="flex flex-col sm:flex-row items-center gap-4">
            <input type="text" name="search" placeholder="Cari buku berdasarkan judul..."
                   class="w-full sm:w-auto px-4 py-2 border border-gray-300 rounded shadow focus:outline-none focus:ring focus:ring-blue-300"
                   value="{{ request('search') }}">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
                🔍 Cari
            </button>
        </form>
    </div>

    {{-- Daftar Buku --}}
    @if($bukus->count())
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($bukus as $buku)
                @php
                    $bgColors = ['bg-blue-50', 'bg-green-50', 'bg-yellow-50', 'bg-pink-50', 'bg-purple-50', 'bg-red-50'];
                    $colorClass = $bgColors[$loop->index % count($bgColors)];
                @endphp

                <div class="{{ $colorClass }} rounded-xl shadow border border-gray-200 p-4 hover:shadow-lg transition duration-300 flex flex-col items-center">
                    
                    {{-- Gambar Cover --}}
                    @if ($buku->cover)
                        <img src="{{ asset($buku->cover) }}" alt="Cover {{ $buku->judul }}"
                             class="w-28 h-40 object-cover mb-3 rounded">
                    @else
                        <div class="w-28 h-40 bg-gray-200 flex items-center justify-center text-gray-500 text-sm mb-3 rounded">
                            Tidak ada cover
                        </div>
                    @endif

                    {{-- Informasi Buku --}}
                    <h3 class="text-center font-semibold text-blue-800 text-sm mb-1 truncate w-full">{{ $buku->judul }}</h3>
                    <p class="text-xs text-gray-600 text-center"><strong>Penulis:</strong> {{ $buku->penulis }}</p>
                    <p class="text-xs text-gray-600 text-center"><strong>Penerbit:</strong> {{ $buku->penerbit }}</p>
                    <p class="text-xs text-gray-600 text-center mb-2"><strong>Tahun:</strong> {{ $buku->tahun_terbit }}</p>

                    {{-- Tombol Aksi --}}
                    <div class="flex justify-center gap-2 mt-auto">
                        <a href="{{ route('buku.show', $buku->id) }}"
                           class="text-blue-600 hover:underline text-sm">📖 Detail</a>

                        <form action="{{ route('peminjaman.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="buku_id" value="{{ $buku->id }}">
                            <button type="submit"
                                    class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-sm">
                                📥 Pinjam
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $bukus->withQueryString()->links() }}
        </div>
    @else
        <div class="text-gray-500 italic mt-6">📭 Tidak ada buku ditemukan.</div>
    @endif
</div>
@endsection
