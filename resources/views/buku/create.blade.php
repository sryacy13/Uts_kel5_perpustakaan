@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto py-8">
        <h2 class="text-2xl font-semibold mb-6">Tambah Buku</h2>

        <form action="{{ route('buku.store') }}" method="POST" class="space-y-4">
            @csrf
            <input type="text" name="judul" placeholder="Judul" class="w-full border p-2 rounded" required>
            <input type="text" name="penulis" placeholder="Penulis" class="w-full border p-2 rounded" required>
            <input type="text" name="penerbit" placeholder="Penerbit" class="w-full border p-2 rounded" required>
            <input type="number" name="tahun_terbit" placeholder="Tahun Terbit" class="w-full border p-2 rounded" required>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
        </form>
    </div>
@endsection
