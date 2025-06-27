<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman utama (welcome)
Route::get('/', function () {
    return view('welcome');
});

// Dashboard utama: redirect ke admin/user sesuai role
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');


// ==========================
// 🔐 ROUTE UNTUK ADMIN
// ==========================
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
    
    // Manajemen Buku
    Route::resource('buku', BukuController::class);

    // Manajemen User
    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    // Transaksi
    Route::resource('transaksi', TransaksiController::class);
});


// ==========================
// 👤 ROUTE UNTUK USER
// ==========================
Route::middleware(['auth', 'role:user'])->group(function () {
    // Dashboard user
    Route::get('/user/dashboard', [DashboardController::class, 'user'])->name('user.dashboard');

    // Koleksi pribadi
    Route::resource('koleksi', KoleksiController::class)->only(['index', 'create', 'store']);

    // Peminjaman buku (POST dari tombol "Pinjam")
    Route::post('/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');

    // Lihat daftar peminjaman user
    Route::get('/peminjaman/saya', [PeminjamanController::class, 'index'])->name('peminjaman.index');
});


// ==========================
// ✏️ ROUTE PROFIL (semua role)
// ==========================
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route dari Laravel Breeze
require __DIR__.'/auth.php';
