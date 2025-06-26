@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto py-8">
        <h2 class="text-2xl font-semibold mb-6 text-center">📚 Koleksi Buku</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4 text-center">{{ session('success') }}</div>
        @endif

        {{-- <div class="mb-4 text-left">
            <a href="{{ route('koleksi.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tambah
                Koleksi</a>
        </div> --}}

        <table class="w-full border border-gray-300 table-auto text-center">
            <thead class="bg-purple-100 text-purple-800">
                <tr>
                    <th class="p-3 border">Judul</th>
                    <th class="p-3 border">Penulis</th>
                    <th class="p-3 border">Penerbit</th>
                    <th class="p-3 border">Tahun Terbit</th>
                </tr>
            </thead>
            <tbody>
                @forelse($koleksis as $koleksi)
                    <tr class="even:bg-purple-50 hover:bg-purple-100 transition">
                        <td class="p-3 border">{{ $koleksi->judul }}</td>
                        <td class="p-3 border">{{ $koleksi->penulis }}</td>
                        <td class="p-3 border">{{ $koleksi->penerbit }}</td>
                        <td class="p-3 border">{{ $koleksi->tahun_terbit ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center p-4">Belum ada koleksi buku.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
