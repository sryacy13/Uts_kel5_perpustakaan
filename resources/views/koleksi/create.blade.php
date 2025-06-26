@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto py-8">
        <h2 class="text-2xl font-semibold mb-6">➕ Tambah Koleksi Buku</h2>

        <form action="{{ route('koleksi.store') }}" method="POST" class="space-y-4">
            @csrf

            <input type="text" name="judul" placeholder="Judul Buku" class="w-full border p-2 rounded" required>

            <input type="text" name="kategori" placeholder="Kategori" class="w-full border p-2 rounded" required>

            <input type="text" name="penulis" placeholder="Penulis" class="w-full border p-2 rounded" required>

            <textarea name="deskripsi" rows="4" placeholder="Deskripsi" class="w-full border p-2 rounded"></textarea>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Simpan Koleksi
            </button>
        </form>
    </div>
@endsection
