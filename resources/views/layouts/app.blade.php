<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Perpustakaan') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">
<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800 text-white p-4"> {{-- Ganti dari bg-black ke bg-gray-800 --}}
        <div class="text-2xl font-bold mb-8">📚 PERPUSTAKAAN</div>

        @auth
        <div class="mb-6">
            <div class="font-semibold">👤 {{ Auth::user()->name }}</div>
            <div class="text-green-400 text-sm">● Online</div>
        </div>
        @endauth

        <nav class="space-y-2">
            <a href="{{ route('dashboard') }}" class="block p-2 rounded hover:bg-blue-700">📊 Dashboard</a>
            <a href="{{ route('buku.index') }}" class="block p-2 rounded hover:bg-blue-700">📘 Inventori Buku</a>
            <a href="{{ route('transaksi.index') }}" class="block p-2 rounded hover:bg-blue-700">🔄 Data Transaksi</a>
        </nav>
    </aside>

    <!-- Content area -->
    <div class="flex-1 flex flex-col">
        <!-- Navbar -->
        <nav class="bg-white shadow px-6 py-4 flex justify-between items-center">
            <div class="text-lg font-bold text-gray-800">Dashboard</div>
            <div class="space-x-4">
                @auth
                    <span class="text-gray-600">Hai, {{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Register</a>
                    @endif
                @endauth
            </div>
        </nav>

        <!-- Main content -->
        <main class="p-6">
            @yield('content')
        </main>
    </div>
</div>
</body>
</html>
