<?php
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
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


Route::resource('mahasiswa', MahasiswaController::class);

Route::get('/about', function () {
    return view('halaman-about');
});

Route::get('/home', [HomeController::class, 'index']);

Route::post('question/store', [QuestionController::class, 'store'])
		->name('question.store');
     
Route::get('/question', [QuestionController::class, 'index'])
		->name('question.index');

Route::get('/dashboard', [DashboardController::class, 'index'])
		->name('dashboard.index');