<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LombaController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/admin/dashboard', function () {
    return view('app.admin.dashboard');
});

Route::get('/admin/detailLomba', function () {
    return view('app.admin.detailLomba');
});

Route::get('/admin/create-lomba', function () {
    return view('app.admin.create');
});

Route::get('/admin/peserta-lomba', function () {
return view('app.admin.list-peserta-lomba');
});

Route::get('/', function () {
return view('addDataLomba');
});

Route::post('/lomba/store', [LombaController::class, 'store'])->name('lomba.store');
