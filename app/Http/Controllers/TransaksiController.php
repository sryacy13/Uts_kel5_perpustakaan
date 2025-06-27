<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\User;
use App\Models\Buku;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Tampilkan semua data transaksi.
     */
   public function index()
{
    $transaksis = Transaksi::with(['user', 'buku'])->get();
    return view('transaksi.index', compact('transaksis'));
}

public function create()
{
    $users = User::all();
    $bukus = Buku::all();
    return view('transaksi.create', compact('users', 'bukus'));
}

public function store(Request $request)
{
    Transaksi::create($request->all());
    return redirect()->route('transaksi.index');
}

public function update(Request $request, Transaksi $transaksi)
{
    $transaksi->update([
        'tanggal_kembali' => now(),
        'status' => 'dikembalikan'
    ]);
    return redirect()->route('transaksi.index');
}
}