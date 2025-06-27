<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::all();
        return view('buku.index', compact('bukus'));
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|digits:4|integer',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['judul', 'penulis', 'penerbit', 'tahun_terbit']);

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $coverName = time() . '_' . $cover->getClientOriginalName();
            $cover->move(public_path('covers'), $coverName);
            $data['cover'] = 'covers/' . $coverName;
        }

        Buku::create($data);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function edit(Buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|digits:4|integer',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['judul', 'penulis', 'penerbit', 'tahun_terbit']);

        if ($request->hasFile('cover')) {
            // Hapus cover lama
            if ($buku->cover && File::exists(public_path($buku->cover))) {
                File::delete(public_path($buku->cover));
            }

            $cover = $request->file('cover');
            $coverName = time() . '_' . $cover->getClientOriginalName();
            $cover->move(public_path('covers'), $coverName);
            $data['cover'] = 'covers/' . $coverName;
        }

        $buku->update($data);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy(Buku $buku)
    {
        // Hapus file cover jika ada
        if ($buku->cover && File::exists(public_path($buku->cover))) {
            File::delete(public_path($buku->cover));
        }

        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus.');
    }
}
