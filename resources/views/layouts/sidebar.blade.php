<div class="w-64 bg-blue-900 text-white min-h-screen p-4">
    <div class="text-xl font-bold mb-6">📚 PERPUSTAKAAN</div>

    <div class="mb-4">
        <div class="text-white font-semibold">👤 {{ Auth::user()->name }}</div>
        <div class="text-green-400 text-sm">● Online</div>
    </div>

   <nav class="space-y-2">
        <a href="{{ route('dashboard') }}" class="block p-2 rounded hover:bg-blue-700">📊 Dashboard</a>
        <a href="{{ route('buku.index') }}" class="block p-2 rounded hover:bg-blue-700">📘 Inventori Buku</a>
        <a href="{{ route('transaksi.index') }}" class="block p-2 rounded hover:bg-blue-700">🔄 Data Transaksi</a>
    </nav>
</div>
