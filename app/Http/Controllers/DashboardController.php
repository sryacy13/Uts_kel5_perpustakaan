<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Buku;
use App\Models\Peminjaman;

class DashboardController extends Controller
{
    public function index()
    {
        $role = auth()->user()->role;

        if ($role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }
    }

    public function admin()
    {
        $totalBuku = Buku::count();
        $totalPeminjam = Peminjaman::count();
        $totalAnggota = User::where('role', 'user')->count();
        $pengunjungHariIni = User::whereDate('last_login_at', today())->count();

        return view('dashboard.admin', compact(
            'totalBuku',
            'totalPeminjam',
            'totalAnggota',
            'pengunjungHariIni'
        ));
    }

    public function user(Request $request)
    {
        $query = Buku::query();

        // Filter pencarian berdasarkan judul buku
        if ($request->has('search') && $request->search !== '') {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        $bukus = $query->paginate(10); // Pagination 10 buku per halaman

        return view('dashboard.user', compact('bukus'));
    }
}
