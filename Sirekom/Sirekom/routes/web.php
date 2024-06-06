<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LombaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', [DashboardController::class, 'index']);

Route::get('/admin/detail-lomba', function () {
    return view('app.admin.detailLomba');
});

Route::get('/admin/create-lomba', function () {
    return view('app.admin.create');
});

Route::get('/admin/peserta-lomba', function () {
    return view('app.admin.list-peserta-lomba');
});

Route::get('/mahasiswa/profile', function () {
    return view('app.mahasiswa.profile');
});

Route::get('/admin/lomba-store', function () {
    return view('app.admin.lombastore');
});

Route::get('/mahasiswa/detail-lomba', function () {
    return view('app.mahasiswa.detailLomba');
});

Route::get('/mahasiswa/data-lomba', function () {
    return view('app.mahasiswa.data-lomba');
});

Route::get('/mahasiswa/profile', function () {
    return view('app.mahasiswa.profile');
});

Route::get('/login', function () {
    return view('app.login');
});

Route::get('/register', [RegisterController::class, 'index']);

Route::post('/register', [RegisterController::class, 'index']);

Route::resource('lomba', LombaController::class);

