<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    // Pastikan nama tabel sesuai dengan migration
    protected $table = 'peminjaman';

    // Kolom yang boleh diisi secara massal
    protected $fillable = [
        'user_id',
        'buku_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status'
    ];

    // Relasi ke tabel users
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke tabel bukus
    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}
