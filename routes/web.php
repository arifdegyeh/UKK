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

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/profil', [DashboardController::class, 'profil'])->name('profil');

    /*
    |--------------------------------------------------------------------------
    | SISWA
    |--------------------------------------------------------------------------
    */
    Route::prefix('siswa')->middleware('role:siswa')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'siswa'])->name('dashboard.siswa');
        Route::get('/aspirasi', [AspirasiController::class, 'index'])->name('aspirasi.saya');
        Route::get('/aspirasi/create', [AspirasiController::class, 'createForm'])->name('aspirasi.create');
        Route::post('/aspirasi', [AspirasiController::class, 'store'])->name('aspirasi.store');
        Route::get('/notifikasi', [DashboardController::class, 'notifikasi'])->name('notifikasi');
    });

    /*
    |--------------------------------------------------------------------------
    | ADMIN
    |--------------------------------------------------------------------------
    */
    Route::prefix('admin')->middleware('role:admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.admin');

        Route::get('/aspirasi', [AspirasiController::class, 'adminIndex'])->name('admin.aspirasi');
        Route::patch('/aspirasi/{id}/status', [AspirasiController::class, 'updateStatus'])->name('admin.aspirasi.status');

        Route::get('/users', [UserController::class, 'index'])->name('admin.users');
        Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
        Route::post('/users/foto', [UserController::class, 'updateFoto'])->name('admin.users.foto');

        Route::get('/kategori', [KategoriController::class, 'index'])->name('admin.kategori');
        Route::post('/kategori', [KategoriController::class, 'store'])->name('admin.kategori.store');
        Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('admin.kategori.update');
        Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('admin.kategori.destroy');

        Route::get('/laporan', [DashboardController::class, 'laporan'])->name('admin.laporan');

        Route::post('/aspirasi/{id}/feedback', [AspirasiController::class, 'storeFeedback'])->name('admin.feedback.store');
        Route::delete('/feedback/{id}', [AspirasiController::class, 'destroyFeedback'])->name('admin.feedback.destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | PROFILE (BREEZE)
    |--------------------------------------------------------------------------
    */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';