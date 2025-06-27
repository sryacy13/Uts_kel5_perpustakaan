<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\User;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaksi;
class PeminjamanController extends Controller
{
    // Hanya untuk admin: lihat semua peminjaman
    public function index()
    {
        $peminjamans = Peminjaman::with(['user', 'buku'])->get();
        return view('peminjaman.index', compact('peminjamans'));
    }

    // Hanya untuk admin: form tambah peminjaman
    public function create()
    {
        $users = User::where('role', 'user')->get();
        $bukus = Buku::all();
        return view('peminjaman.create', compact('users', 'bukus'));
    }

    // Admin menyimpan data peminjaman manual
    public function store(Request $request)
    {
        // Cek apakah ini user biasa atau admin
        if (Auth::user()->role === 'user') {
            return $this->storeByUser($request); // Delegasi ke fungsi khusus user
        }

        // Admin input manual
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'buku_id' => 'required|exists:bukus,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date|after_or_equal:tanggal_pinjam',
        ]);

        Peminjaman::create([
            'user_id' => $request->user_id,
            'buku_id' => $request->buku_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali ?? now()->addDays(7),
            'status' => 'dipinjam',
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Transaksi peminjaman berhasil dicatat.');
    }

  protected function storeByUser(Request $request)
{
    $request->validate([
        'buku_id' => 'required|exists:bukus,id',
    ]);

    // Simpan ke tabel peminjaman
    $peminjaman = Peminjaman::create([
        'user_id' => Auth::id(),
        'buku_id' => $request->buku_id,
        'tanggal_pinjam' => now(),
        'tanggal_kembali' => now()->addDays(7),
        'status' => 'dipinjam',
    ]);

    // Simpan juga ke tabel transaksi
    Transaksi::create([
        'user_id' => Auth::id(),
        'buku_id' => $request->buku_id,
        'tanggal_pinjam' => $peminjaman->tanggal_pinjam,
        'tanggal_kembali' => $peminjaman->tanggal_kembali,
        'status' => $peminjaman->status,
    ]);

    return redirect()->route('user.dashboard')->with('success', 'Buku berhasil dipinjam!');
}

    public function update(Request $request, Peminjaman $peminjaman)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'buku_id' => 'required|exists:bukus,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date|after_or_equal:tanggal_pinjam',
            'status' => 'required|in:dipinjam,dikembalikan',
        ]);

        $peminjaman->update([
            'user_id' => $request->user_id,
            'buku_id' => $request->buku_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => $request->status,
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman diperbarui.');
    }

    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();
        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman dihapus.');
    }
}
