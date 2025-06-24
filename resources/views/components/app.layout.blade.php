<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        {{-- Header (opsional slot) --}}
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4">
                    {{ $header }}
                </div>
            </header>
        @endisset

        {{-- Konten utama --}}
        <main>
            {{ $slot }}
        </main>
    </div>
</body>
</html>
