<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'buku_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
    ];

    // Relasi ke User (peminjam)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Buku yang dipinjam
    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}
