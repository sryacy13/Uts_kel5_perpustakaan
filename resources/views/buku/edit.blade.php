@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto py-8">
        <h2 class="text-2xl font-semibold mb-6">Edit Buku</h2>

        <form action="{{ route('buku.update', $buku) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')
            <input type="text" name="judul" value="{{ $buku->judul }}" class="w-full border p-2 rounded" required>
            <input type="text" name="penulis" value="{{ $buku->penulis }}" class="w-full border p-2 rounded" required>
            <input type="text" name="penerbit" value="{{ $buku->penerbit }}" class="w-full border p-2 rounded" required>
            <input type="number" name="tahun_terbit" value="{{ $buku->tahun_terbit }}" class="w-full border p-2 rounded" required>

            <div>
                <label for="cover" class="block text-sm font-medium text-gray-700 mb-1">Ganti Cover (Opsional)</label>
                <input type="file" name="cover" id="cover" accept="image/*" class="w-full border p-2 rounded">
            </div>

            @if ($buku->cover)
                <div class="mt-2">
                    <p class="text-sm text-gray-600 mb-1">Cover Saat Ini:</p>
                    <img src="{{ asset($buku->cover) }}" alt="Cover Buku" class="w-24 h-32 object-cover rounded">
                </div>
            @endif

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Perbarui</button>
        </form>
    </div>
@endsection
