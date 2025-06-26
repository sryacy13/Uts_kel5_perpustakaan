<?php
namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Koleksi;
use Illuminate\Http\Request;

class KoleksiController extends Controller
{
    public function index()
    {
        $koleksis = Buku::with('peminjaman')->get();
        return view('koleksi.index', compact('koleksis'));
    }

    public function create()
    {
        return view('koleksi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'penulis' => 'required',
        ]);

        Koleksi::create($request->all());

        return redirect()->route('koleksi.index')->with('success', 'Koleksi berhasil ditambahkan.');
    }
}
