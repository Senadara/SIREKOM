<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LombaController;
use App\Http\Controllers\Admin\PesertaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Api\PesertaController as ApiPesertaController;
use App\Http\Controllers\Mahasiswa\ProfileController;
use App\Http\Controllers\Mahasiswa\SubmissionController;
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

Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});

Route::get('/mahasiswa/profile/{$id}', [ProfileController::class, 'edit']);

Route::put('/mahasiswa/profile/{$id}', [ProfileController::class, 'update']);

Route::resource('admin/lomba', LombaController::class);

Route::get('/mahasiswa/detailInfodanSubmit', function () {
    return view('app.mahasiswa.detailInfodanSubmit');
});

Route::get('/mahasiswa/submission', [SubmissionController::class, 'index']);

Route::post('mahasiswa/submission/store', [SubmissionController::class, 'store'])->name('FileUpload');

Route::post('mahasiswa/submission/file-delete', [SubmissionController::class, 'destroy']);


// Route::get('/mahasiswa/{id}/submission', [SubmissionController::class, 'index']);
// Route::post('/mahasiswa/submission/store', [SubmissionController::class, 'FileUpload'])->name('FileUpload');
// Route::delete('/mahasiswa/submission/{id}', [SubmissionController::class, 'destroy'])->name('submission.destroy');
// Route::post('/mahasiswa/submission', [SubmissionController::class, 'store'])->name('storeSubmission');

// Route::resource('lomba', LombaController::class);
// Route::resource('admin/lomba', LombaController::class);



// Route::get('/admin/peserta-lomba/{idLomba?}', [PesertaController::class, 'index']);
// coba api
Route::get('/admin/peserta-lomba/{idLomba?}', [ApiPesertaController::class, 'memanggilAPIGetAlldata']);

// export excel
Route::get('/peserta/export_excel/{idLomba?}', [ApiPesertaController::class, 'export_excel']);

// Route::get('/peserta/lomba/{idLomba}', [PesertaController::class, 'getPesertaByLomba'])->name('peserta.lomba');
