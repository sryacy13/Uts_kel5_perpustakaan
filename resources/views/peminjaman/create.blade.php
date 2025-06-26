@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto py-8">
        <h2 class="text-2xl font-semibold mb-6">Tambah Transaksi Peminjaman</h2>

        <form action="{{ route('peminjaman.store') }}" method="POST" class="space-y-4">
            @csrf

            <select name="user_id" class="w-full border p-2 rounded" required>
                <option value="">Pilih Peminjam</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>

            <select name="buku_id" class="w-full border p-2 rounded" required>
                <option value="">Pilih Buku</option>
                @foreach ($bukus as $buku)
                    <option value="{{ $buku->id }}">{{ $buku->judul }}</option>
                @endforeach
            </select>

            <input type="date" name="tanggal_pinjam" class="w-full border p-2 rounded" required>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
        </form>
    </div>
@endsection
