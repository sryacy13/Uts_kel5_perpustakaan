<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Perpustakaan') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">
    <nav class="bg-white shadow px-6 py-4 flex justify-between items-center">
        <a href="{{ url('/') }}" class="text-lg font-bold text-gray-800">Perpustakaan</a>

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

    <main class="container mx-auto px-4 py-6">
        @yield('content')
    </main>
</body>
</html>
