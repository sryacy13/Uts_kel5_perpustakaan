@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">+ Tambah Transaksi</h2>

    <form action="{{ route('transaksi.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block">Pilih User</label>
            <select name="user_id" class="border p-2 w-full">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block">Pilih Buku</label>
            <select name="buku_id" class="border p-2 w-full">
                @foreach($bukus as $buku)
                    <option value="{{ $buku->id }}">{{ $buku->judul }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block">Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" class="border p-2 w-full" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Simpan Transaksi
        </button>
    </form>
</div>
@endsection
