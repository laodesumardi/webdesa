<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'beranda'])->name('beranda');
Route::get('/profil', [PageController::class, 'profil'])->name('profil');
Route::get('/pemerintahan', [PageController::class, 'pemerintahan'])->name('pemerintahan');
Route::get('/berita', [PageController::class, 'berita'])->name('berita');
Route::get('/layanan', [PageController::class, 'layanan'])->name('layanan');
Route::get('/data', [PageController::class, 'data'])->name('data');
Route::get('/darurat', [PageController::class, 'darurat'])->name('darurat');
Route::get('/kesehatan', [PageController::class, 'kesehatan'])->name('kesehatan');
Route::get('/galeri', [PageController::class, 'galeri'])->name('galeri');
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');
