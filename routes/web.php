<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        if (Auth::user()->role === 'admin') {
            return redirect('/admin-dashboard');
        }
        return redirect('/petugas');
    }
    return redirect()->route('login');
});

Route::get('/beranda', function () {
    return redirect('/beranda.php');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/admin-dashboard', function () {
        return view('admin.dashboard');
    })->name('admin-dashboard');

Route::get('/fasilitas-umum', [\App\Http\Controllers\FasilitasController::class, 'index']);

Route::get('/inspeksi-sanitasi', function () {
    return view('admin.inspeksi');
});

Route::get('/petugas', function () {
    return view('admin.petugas');
});

Route::get('/jadwal-petugas', function () {
    return view('admin.jadwal-petugas');
});

Route::get('/rekap-laporan', [\App\Http\Controllers\LaporanController::class, 'index']);

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

}); // Tutup middleware auth
