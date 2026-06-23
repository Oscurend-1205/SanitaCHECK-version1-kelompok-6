<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PetugasAreaController;
use App\Http\Controllers\AdminInspeksiController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminLaporanController;
use App\Http\Controllers\AdminTindakLanjutController;
use App\Http\Controllers\AdminRiwayatTindakLanjutController;
use App\Http\Controllers\AdminJadwalPetugasController;

Route::get('/', function () {
    if (Auth::check()) {
        if (Auth::user()->role === 'admin') {
            return redirect('/admin-dashboard');
        }
        return redirect('/petugas');
    }
    // Arahkan pengunjung umum (belum login) ke halaman publik native
    return redirect('/beranda.php');
});

Route::get('/beranda', function () {
    return redirect('/beranda.php');
});

// Fallback untuk guest middleware redirect
Route::get('/home', function () {
    return redirect('/');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/admin-dashboard', [AdminDashboardController::class, 'index'])->name('admin-dashboard');

    // Fasilitas CRUD
    Route::get('/fasilitas-umum', [FasilitasController::class, 'index'])->name('fasilitas.index');
    Route::post('/fasilitas-umum', [FasilitasController::class, 'store'])->name('fasilitas.store');
    Route::put('/fasilitas-umum/{id}', [FasilitasController::class, 'updateById'])->name('fasilitas.update');
    Route::delete('/fasilitas-umum/{id}', [FasilitasController::class, 'destroy'])->name('fasilitas.destroy');

    // Inspeksi CRUD
    Route::get('/inspeksi-sanitasi', [AdminInspeksiController::class, 'index'])->name('inspeksi.index');
    Route::post('/inspeksi-sanitasi', [AdminInspeksiController::class, 'store'])->name('inspeksi.store');
    Route::put('/inspeksi-sanitasi/{id}', [AdminInspeksiController::class, 'update'])->name('inspeksi.update');
    Route::delete('/inspeksi-sanitasi/{id}', [AdminInspeksiController::class, 'destroy'])->name('inspeksi.destroy');

    // Petugas CRUD
    Route::get('/petugas', [PetugasController::class, 'index'])->name('petugas.index');
    Route::post('/petugas', [PetugasController::class, 'store'])->name('petugas.store');
    Route::put('/petugas/{id}', [PetugasController::class, 'updateById'])->name('petugas.update');
    Route::delete('/petugas/{id}', [PetugasController::class, 'destroy'])->name('petugas.destroy');

    // Jadwal Petugas
    Route::get('/jadwal-petugas', [AdminJadwalPetugasController::class, 'index'])->name('jadwal-petugas.index');

    // Rekap Laporan
    Route::get('/rekap-laporan', [AdminLaporanController::class, 'index'])->name('laporan.index');

    // Tindak Lanjut
    Route::get('/tindak-lanjut', [AdminTindakLanjutController::class, 'index'])->name('tindak-lanjut.index');
    Route::put('/tindak-lanjut/{id}', [AdminTindakLanjutController::class, 'updateStatus'])->name('tindak-lanjut.update');

    // Riwayat Tindak Lanjut
    Route::get('/riwayat-tindak-lanjut', [AdminRiwayatTindakLanjutController::class, 'index'])->name('riwayat-tindak-lanjut.index');

    // Profil (statis — data user dari auth)
    Route::get('/profil', function () {
        return view('admin.profil');
    })->name('profil');

    // Pengaturan (statis — konfigurasi UI)
    Route::get('/pengaturan', function () {
        return view('admin.pengaturan');
    })->name('pengaturan');

}); // Tutup middleware auth

// ==========================================
// AREA PETUGAS (Dilindungi middleware auth & custom role:petugas)
// ==========================================
Route::middleware(['auth', 'role:petugas'])->prefix('area-petugas')->name('petugas.')->group(function () {
    Route::get('/dashboard', [PetugasAreaController::class, 'dashboard'])->name('dashboard');
    Route::get('/jadwal', [PetugasAreaController::class, 'jadwal'])->name('jadwal');
    
    // Inspeksi
    Route::get('/inspeksi/create/{fasilitas_id}', [PetugasAreaController::class, 'create'])->name('inspeksi.create');
    Route::post('/inspeksi', [PetugasAreaController::class, 'store'])->name('inspeksi.store');
    Route::get('/inspeksi/riwayat', [PetugasAreaController::class, 'riwayat'])->name('riwayat');
    
    // Profil
    Route::get('/profil', [PetugasAreaController::class, 'profil'])->name('profil');
    Route::put('/profil/password', [PetugasAreaController::class, 'updatePassword'])->name('updatePassword');
});
