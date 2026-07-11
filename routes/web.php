<?php

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

//admin-login
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');