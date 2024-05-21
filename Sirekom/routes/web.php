<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\LombaController;
use App\Http\Controllers\Admin\PesertaController;
use App\Http\Controllers\Mahasiswa\MahasiswaController;

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

Route::get('/admin/peserta-lomba', [PesertaController::class, 'index']);

Route::get('/mahasiswa/profile', function () {
    return view('app.mahasiswa.profile');
});

Route::get('/admin/lomba-store', function () {
    return view('app.admin.lombastore');
});

Route::get('/mahasiswa/detail-lomba', function () {
    return view('app.mahasiswa.detailLomba');
});

Route::get('/mahasiswa/data-lomba', [MahasiswaController::class, 'index']);

Route::get('/mahasiswa/profile', function () {
    return view('app.mahasiswa.profile');
});

Route::resource('lomba', LombaController::class);
