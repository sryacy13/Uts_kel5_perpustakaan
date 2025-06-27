@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">🔄 Data Transaksi</h2>

    <a href="{{ route('transaksi.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        + Tambah Transaksi
    </a>

    <table class="w-full border mt-4 text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="border p-2">Nama</th>
                <th class="border p-2">Buku</th>
                <th class="border p-2">Tanggal Pinjam</th>
                <th class="border p-2">Tanggal Kembali</th>
                <th class="border p-2">Status</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksis as $transaksi)
                <tr>
                    <td class="border p-2">{{ $transaksi->user->name }}</td>
                    <td class="border p-2">{{ $transaksi->buku->judul }}</td>
                    <td class="border p-2">{{ $transaksi->tanggal_pinjam }}</td>
                    <td class="border p-2">{{ $transaksi->tanggal_kembali ?? '-' }}</td>
                    <td class="border p-2">{{ $transaksi->status }}</td>
                    <td class="border p-2">
                        @if($transaksi->status === 'dipinjam')
                        <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="tanggal_kembali" value="{{ now() }}">
                            <button type="submit" class="text-green-600 hover:underline">Kembalikan</button>
                        </form>
                        @else
                            ✔️
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
