@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto py-8">
        <h2 class="text-2xl font-semibold mb-6 text-center">👥 Daftar Pengguna</h2>

        <table class="w-full border border-gray-300 table-auto text-center">
            <thead class="bg-purple-100 text-purple-800">
                <tr>
                    <th class="p-3 border">Nama</th>
                    <th class="p-3 border">Email</th>
                    <th class="p-3 border">Tanggal Daftar</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr class="even:bg-purple-50 hover:bg-purple-100 transition">
                        <td class="p-3 border">{{ $user->name }}</td>
                        <td class="p-3 border">{{ $user->email }}</td>
                        <td class="p-3 border">{{ $user->created_at->format('d M Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center p-4">Belum ada pengguna.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
