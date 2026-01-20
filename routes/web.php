<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\UmkmController;

// Public Routes
Route::get('/', [PageController::class, 'beranda'])->name('beranda');
Route::get('/profil', [PageController::class, 'profil'])->name('profil');
Route::get('/pemerintahan', [PageController::class, 'pemerintahan'])->name('pemerintahan');
Route::get('/berita', [PageController::class, 'berita'])->name('berita');
Route::get('/berita/{slug}', [PageController::class, 'beritaShow'])->name('berita.show');
Route::get('/layanan', [PageController::class, 'layanan'])->name('layanan');
Route::get('/data', [PageController::class, 'data'])->name('data');
Route::get('/galeri', [PageController::class, 'galeri'])->name('galeri');
Route::get('/ekonomi-umkm', [PageController::class, 'umkm'])->name('umkm');
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');

// Admin Login Routes (Guest)
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [AuthController::class, 'login']);
});

// Admin Routes (Authenticated & Admin)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Content Management Routes
    Route::get('/contents', [\App\Http\Controllers\Admin\ContentController::class, 'index'])->name('contents.index');
    Route::get('/contents/{page}/edit', [\App\Http\Controllers\Admin\ContentController::class, 'edit'])->name('contents.edit');
    Route::put('/contents/{page}', [\App\Http\Controllers\Admin\ContentController::class, 'update'])->name('contents.update');
    Route::post('/contents/upload-foto', [\App\Http\Controllers\Admin\ContentController::class, 'uploadFoto'])->name('contents.upload-foto');
    Route::post('/contents/upload-struktur', [\App\Http\Controllers\Admin\ContentController::class, 'uploadStruktur'])->name('contents.upload-struktur');
    Route::post('/contents/upload-hero', [\App\Http\Controllers\Admin\ContentController::class, 'uploadHero'])->name('contents.upload-hero');
    Route::post('/contents/upload-header-bg', [\App\Http\Controllers\Admin\ContentController::class, 'uploadHeaderBg'])->name('contents.upload-header-bg');
    
    // Perangkat Desa Routes
    Route::post('/perangkat-desa', [\App\Http\Controllers\Admin\PerangkatDesaController::class, 'store'])->name('perangkat-desa.store');
    Route::put('/perangkat-desa/{id}', [\App\Http\Controllers\Admin\PerangkatDesaController::class, 'update'])->name('perangkat-desa.update');
    Route::delete('/perangkat-desa/{id}', [\App\Http\Controllers\Admin\PerangkatDesaController::class, 'destroy'])->name('perangkat-desa.destroy');
    
    // Penduduk Routes
    Route::resource('penduduk', \App\Http\Controllers\Admin\PendudukController::class);
    
    // Berita Routes
    Route::resource('berita', BeritaController::class);
    
    // Galeri Routes
    Route::resource('galeri', GaleriController::class);
    
    // UMKM Routes
    Route::resource('umkm', UmkmController::class);
});
