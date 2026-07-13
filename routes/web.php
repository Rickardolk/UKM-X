<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminDokumentasiController;
use App\Http\Controllers\AdminPublikasiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.home');
});

//user-layanan
Route::get('/layanan/peminjaman-alat', function () {
    return view('user.layanan.sop-peminjaman');
})->name('layanan.peminjaman');

Route::get('/layanan/faq', function () {
    return view('user.layanan.faq');
})->name('layanan.faq');

Route::get('/layanan/kontak', function () {
    return view('user.layanan.contact');
})->name('layanan.kontak');

//user-pendaftaran
Route::get('/pendaftaran', function () {
    return view('user.daftar');
})->name('pendaftaran.index');

Route::get('/profil', function () {
    return view('user.profil');
})->name('profil.index');


//user-arsip
Route::get('/arsip/publikasi', function () {
    return view('user.arsip.publikasi.menu-publikasi');
})->name('arsip.index');

Route::get('/arsip/publikasi/1', function () {
    return view('user.arsip.publikasi.detail-publikasi');
})->name('arsip.publikasi.show');

Route::get('/arsip/dokumentasi', function () {
    return view('user.arsip.dokumentasi.menu-dokumentasi');
})->name('arsip.dokumentasi');

Route::get('/arsip/dokumentasi/outbound', function () {
    return view('user.arsip.dokumentasi.detail-dokumentasi');
})->name('arsip.dokumentasi.show');


//user-Kegiatan
Route::get('/kegiatan', function () {
    return view('user.kegiatan.menu-kegiatan');
})->name('kegiatan.index');

Route::get('/kegiatan/eksplorasi-biota-laut', function () {
    return view('user.kegiatan.detail-kegiatan');
})->name('kegiatan.show');

//user-profile
Route::get('/profil', function () {
    return view('user.profile');
})->name('profil.index');

// Login (publik)
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');


Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::get('/publikasi', [AdminPublikasiController::class, 'index'])->name('publikasi.index');

    Route::get('/publikasi/create', [AdminPublikasiController::class, 'create'])->name('publikasi.create');
    Route::post('/publikasi', [AdminPublikasiController::class, 'store'])->name('publikasi.store');

    Route::get('/publikasi/{id}/edit', [AdminPublikasiController::class, 'edit'])->name('publikasi.edit');
    Route::put('/publikasi/{id}',      [AdminPublikasiController::class, 'update'])->name('publikasi.update');

    Route::get('/dokumentasi',      [AdminDokumentasiController::class,  'index'])->name('dokumentasi.index');

    Route::get('/dokumentasi/create', [AdminDokumentasiController::class, 'create'])->name('dokumentasi.create');
    Route::post('/dokumentasi',       [AdminDokumentasiController::class, 'store'])->name('dokumentasi.store');
});
