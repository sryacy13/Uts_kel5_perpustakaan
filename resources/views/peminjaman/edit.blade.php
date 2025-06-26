@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto py-8">
        <h2 class="text-2xl font-semibold mb-6">Edit Transaksi Peminjaman</h2>

        <form action="{{ route('peminjaman.update', $peminjaman) }}" method="POST" class="space-y-4">
            @csrf @method('PUT')

            <select name="user_id" class="w-full border p-2 rounded" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" @selected($user->id == $peminjaman->user_id)>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>

            <select name="buku_id" class="w-full border p-2 rounded" required>
                @foreach ($bukus as $buku)
                    <option value="{{ $buku->id }}" @selected($buku->id == $peminjaman->buku_id)>
                        {{ $buku->judul }}
                    </option>
                @endforeach
            </select>

            <input type="date" name="tanggal_pinjam" value="{{ $peminjaman->tanggal_pinjam }}"
                class="w-full border p-2 rounded" required>

            <input type="date" name="tanggal_kembali" value="{{ $peminjaman->tanggal_kembali }}"
                class="w-full border p-2 rounded">

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
        </form>
    </div>
@endsection
