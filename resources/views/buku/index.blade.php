@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto py-8">
        <h2 class="text-2xl font-semibold mb-6 text-center">📚 Daftar Buku</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif

        {{-- Tombol Tambah Buku --}}
        <div class="mb-4 text-left">
            <a href="{{ route('buku.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                ➕ Tambah Buku
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="table-auto w-full border border-gray-300 text-center">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 border">Cover</th>
                        <th class="p-3 border">Judul</th>
                        <th class="p-3 border">Penulis</th>
                        <th class="p-3 border">Penerbit</th>
                        <th class="p-3 border">Tahun</th>
                        <th class="p-3 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bukus as $buku)
                        <tr class="border-t even:bg-gray-50 hover:bg-gray-100 transition-colors">
                            <td class="p-3 border">
                                @if ($buku->cover && file_exists(public_path($buku->cover)))
                                    <img src="{{ asset($buku->cover) }}"
                                         alt="Cover buku {{ $buku->judul }}"
                                         class="w-16 h-20 object-cover rounded mx-auto shadow">
                                @else
                                    <span class="text-gray-400 italic">Tidak ada</span>
                                @endif
                            </td>
                            <td class="p-3 border">{{ $buku->judul }}</td>
                            <td class="p-3 border">{{ $buku->penulis }}</td>
                            <td class="p-3 border">{{ $buku->penerbit }}</td>
                            <td class="p-3 border">{{ $buku->tahun_terbit }}</td>
                            <td class="p-3 border">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('buku.edit', $buku) }}"
                                       class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">Edit</a>
                                    <form action="{{ route('buku.destroy', $buku) }}" method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if ($bukus->isEmpty())
                <p class="text-center text-gray-500 mt-4 italic">Belum ada buku yang tersedia.</p>
            @endif
        </div>
    </div>
@endsection
