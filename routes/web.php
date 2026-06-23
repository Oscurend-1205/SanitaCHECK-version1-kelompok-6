<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin-dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/fasilitas-umum', function () {
    return view('admin.fasilitas');
});

Route::get('/inspeksi-sanitasi', function () {
    return view('admin.inspeksi');
});

Route::get('/petugas', function () {
    return view('admin.petugas');
});

Route::get('/jadwal-petugas', function () {
    return view('admin.jadwal-petugas');
});

Route::get('/rekap-laporan', function () {
    return view('admin.laporan');
});

Route::get('/tindak-lanjut', function () {
    return view('admin.tindak-lanjut');
});

Route::get('/riwayat-tindak-lanjut', function () {
    return view('admin.riwayat-tindak-lanjut');
});

Route::get('/profil', function () {
    return view('admin.profil');
});

Route::get('/pengaturan', function () {
    return view('admin.pengaturan');
});
