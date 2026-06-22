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
