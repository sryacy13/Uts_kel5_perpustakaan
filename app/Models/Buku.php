<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    // ✅ Tambahkan 'cover' ke fillable agar bisa disimpan ke database
    protected $fillable = ['judul', 'penulis', 'penerbit', 'tahun_terbit', 'cover'];

    // Relasi ke tabel peminjaman (jika masih digunakan)
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }

    // Relasi ke tabel transaksi
    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
}
