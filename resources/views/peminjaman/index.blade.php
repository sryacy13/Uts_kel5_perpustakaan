@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto py-8">
        <h2 class="text-2xl font-semibold mb-6 text-center">📖 Data Peminjaman Buku</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4 text-center">{{ session('success') }}</div>
        @endif

        <div class="mb-4 text-left">
            <a href="{{ route('peminjaman.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tambah Peminjaman</a>
        </div>

        <table class="table-auto w-full border text-center">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-3 border">Nama Peminjam</th>
                    <th class="p-3 border">Judul Buku</th>
                    <th class="p-3 border">Tanggal Pinjam</th>
                    <th class="p-3 border">Tanggal Kembali</th>
                    <th class="p-3 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peminjamans as $pinjam)
                    <tr class="even:bg-gray-50 hover:bg-gray-100 transition">
                        <td class="p-3 border">{{ $pinjam->user->name }}</td>
                        <td class="p-3 border">{{ $pinjam->buku->judul }}</td>
                        <td class="p-3 border">{{ $pinjam->tanggal_pinjam }}</td>
                        <td class="p-3 border">{{ $pinjam->tanggal_kembali ?? '-' }}</td>
                        <td class="p-3 border">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('peminjaman.edit', $pinjam) }}"
                                    class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">Edit</a>
                                <form action="{{ route('peminjaman.destroy', $pinjam) }}" method="POST"
                                    onsubmit="return confirm('Yakin hapus?')">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
