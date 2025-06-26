@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto py-8">
        <h2 class="text-2xl font-semibold mb-6">Edit Buku</h2>

        <form action="{{ route('buku.update', $buku) }}" method="POST" class="space-y-4">
            @csrf @method('PUT')
            <input type="text" name="judul" value="{{ $buku->judul }}" class="w-full border p-2 rounded" required>
            <input type="text" name="penulis" value="{{ $buku->penulis }}" class="w-full border p-2 rounded" required>
            <input type="text" name="penerbit" value="{{ $buku->penerbit }}" class="w-full border p-2 rounded" required>
            <input type="number" name="tahun_terbit" value="{{ $buku->tahun_terbit }}" class="w-full border p-2 rounded"
                required>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Perbarui</button>
        </form>
    </div>
@endsection
