<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingpage');
})->name('landingpage');

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::get('/profil', [DashboardController::class, 'profil'])->name('profil');

    // Siswa Routes
    Route::middleware('role:siswa')->group(function () {
        Route::get('/siswa/dasboard', [DashboardController::class, 'siswa'])->name('dasboard.siswa');
        Route::get('/siswa/aspirasi', [AspirasiController::class, 'index'])->name('aspirasi.saya');
        Route::get('/siswa/aspirasi/create', [AspirasiController::class, 'createForm'])->name('aspirasi.create');
        Route::post('/siswa/aspirasi', [AspirasiController::class, 'store'])->name('aspirasi.store');
        Route::get('/siswa/notifikasi', [DashboardController::class, 'notifikasi'])->name('notifikasi');
    });

    // Admin Routes
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dasboard', [DashboardController::class, 'index'])->name('dasboard'); // admin dashboard
        Route::get('/admin/aspirasi', [AspirasiController::class, 'adminIndex'])->name('admin.aspirasi');
        Route::post('/admin/aspirasi/{id}/status', [AspirasiController::class, 'updateStatus'])->name('admin.aspirasi.update');
        Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
        Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
        Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
        Route::post('/admin/users/foto', [UserController::class, 'updateFoto'])->name('admin.users.foto');
        Route::get('/admin/kategori', [KategoriController::class, 'index'])->name('admin.kategori');
        Route::post('/admin/kategori', [KategoriController::class, 'store'])->name('admin.kategori.store');
        Route::put('/admin/kategori/{id}', [KategoriController::class, 'update'])->name('admin.kategori.update');
        Route::delete('/admin/kategori/{id}', [KategoriController::class, 'destroy'])->name('admin.kategori.destroy');
        Route::get('/admin/laporan', [DashboardController::class, 'laporan'])->name('admin.laporan');
        Route::post('/admin/aspirasi/{id}/feedback', [AspirasiController::class, 'storeFeedback'])->name('admin.feedback.store');
        Route::delete('/admin/feedback/{id}', [AspirasiController::class, 'destroyFeedback'])->name('admin.feedback.destroy');
    });

    // Breeze default profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
