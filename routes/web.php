<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\TentangController;
use App\Http\Controllers\Frontend\VisiMisiController;
use App\Http\Controllers\Frontend\KepengurusanController;
use App\Http\Controllers\Frontend\ProdukController;
use App\Http\Controllers\Frontend\KontakController;
use App\Http\Controllers\Frontend\GaleriController;

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Tentang Karang Taruna
Route::prefix('tentang')->group(function () {
    Route::get('/', [TentangController::class, 'index'])->name('tentang.index');
    Route::get('/logo', [TentangController::class, 'logo'])->name('tentang.logo');
    Route::get('/filosofi-logo', [TentangController::class, 'filosofiLogo'])->name('tentang.filosofi');
    Route::get('/profil', [TentangController::class, 'profil'])->name('tentang.profil');
});

// Visi & Nilai
Route::prefix('visi-nilai')->group(function () {
    Route::get('/', [VisiMisiController::class, 'index'])->name('visi.index');
    Route::get('/visi', [VisiMisiController::class, 'visi'])->name('visi.visi');
    Route::get('/misi', [VisiMisiController::class, 'misi'])->name('visi.misi');
    Route::get('/tujuan-fungsi', [VisiMisiController::class, 'tujuanFungsi'])->name('visi.tujuan');
    Route::get('/nilai-dasar', [VisiMisiController::class, 'nilaiDasar'])->name('visi.nilai');
});

// Kepengurusan
Route::prefix('kepengurusan')->group(function () {
    Route::get('/', [KepengurusanController::class, 'index'])->name('kepengurusan.index');
    Route::get('/struktur', [KepengurusanController::class, 'struktur'])->name('kepengurusan.struktur');
    Route::get('/tugas', [KepengurusanController::class, 'tugas'])->name('kepengurusan.tugas');
    Route::get('/tokoh-utama', [KepengurusanController::class, 'tokohUtama'])->name('kepengurusan.tokoh');
});

// Produk & Mitra
Route::prefix('produk-mitra')->group(function () {
    Route::get('/', [ProdukController::class, 'index'])->name('produk.index');
    Route::get('/produk', [ProdukController::class, 'produk'])->name('produk.list');
    Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');
    Route::get('/mitra', [ProdukController::class, 'mitra'])->name('produk.mitra');
    Route::get('/testimoni', [ProdukController::class, 'testimoni'])->name('produk.testimoni');
});

// Galeri (Foto, Video & Arsip Berita)
Route::prefix('galeri')->group(function () {
    Route::get('/', [GaleriController::class, 'index'])->name('galeri.index');
    Route::get('/foto', [GaleriController::class, 'foto'])->name('galeri.foto');
    Route::get('/video', [GaleriController::class, 'video'])->name('galeri.video');
    Route::get('/berita', [GaleriController::class, 'berita'])->name('galeri.berita');
    Route::get('/berita/{id}', [GaleriController::class, 'beritaShow'])->name('galeri.berita.show');
    Route::get('/{id}', [GaleriController::class, 'show'])->name('galeri.show');
});

// Kontak
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');

// Admin Authentication Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [\App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
});

// Admin Routes (protected by authentication)
Route::prefix('admin')->name('admin.')->middleware('admin.auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    
    // Resources
    Route::resource('profile', \App\Http\Controllers\Admin\ProfileController::class);
    Route::resource('visi-misi', \App\Http\Controllers\Admin\VisiMisiController::class);
    Route::resource('kepengurusan', \App\Http\Controllers\Admin\KepengurusanController::class);
    Route::resource('kegiatan', \App\Http\Controllers\Admin\KegiatanController::class);
    Route::resource('produk', \App\Http\Controllers\Admin\ProdukController::class);
    Route::resource('mitra', \App\Http\Controllers\Admin\MitraController::class);
    Route::resource('kontak', \App\Http\Controllers\Admin\KontakController::class);
});

