<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;  // Tambahkan ini
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// 📢 Publik & user bisa lihat daftar berita
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{berita}', [BeritaController::class, 'show'])->name('berita.show');

// 🔐 Hanya admin bisa CRUD
Route::middleware(['auth', 'verified', 'admin'])->prefix('admin')->group(function () {
    Route::resource('berita', BeritaController::class)->except(['index', 'show']);
});

// 👤 Dashboard & profil
Route::middleware(['auth', 'verified'])->group(function () {
    // Ganti route dashboard ke DashboardController@index supaya dinamis
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
