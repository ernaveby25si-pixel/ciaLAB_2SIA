<?php

use Illuminate\Support\Facades\Route;

Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';
});

Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
});
Route::get('/mahasiswa/detail', function () {
    return '<h1>Selamat Datang !</h1> <h2>Ini halaman Detail Mahasiswa</h2>';
});
Route::get('/mahasiswa/profile', function () {
    return '<h1>Selamat Datang !</h1> <h2>Ini halaman Profile Mahasiswa</h2>';
});

Route::get('/nama/{param1}', function ($param1) {
    return 'Nama saya: '.$param1;
});

Route::get('/nim/{param1?}', function ($param1 = '') {
    return 'NIM saya: '.$param1;
}); 

use App\Http\Controllers\MahasiswaController;

Route::resource('mahasiswa', MahasiswaController::class);

Route::get('/about', function () {
    return view('halaman-about');
});

use App\Http\Controllers\HomeController;

Route::get('/home', [HomeController::class, 'index']);