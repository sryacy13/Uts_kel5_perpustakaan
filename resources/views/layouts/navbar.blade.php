<div class="bg-white shadow px-4 py-3 flex justify-between items-center">
    <div class="font-semibold text-gray-700">Dashboard</div>
    <div class="flex items-center gap-3">
        <span class="text-gray-600">Hai, {{ Auth::user()->name }}</span>
        <form action="{{ route('logout') }}" method="POST">@csrf
            <button class="bg-red-500 text-black px-3 py-1 rounded">Logout</button>
        </form>
    </div>
</div>
