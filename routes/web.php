<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.home');
});

Route::get('/layanan/peminjaman-alat', function () {
    return view('user.layanan.sop-peminjaman');
})->name('layanan.peminjaman');

Route::get('/kegiatan', function () {
    return view('user.kegiatan.menu-kegiatan');
})->name('kegiatan.index');

Route::get('/arsip/publikasi', function () {
    return view('user.arsip.publikasi.menu-publikasi');
})->name('arsip.index');

Route::get('/pendaftaran', function () {
    return view('user.daftar');
})->name('pendaftaran.index');
