<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LombaController;
use App\Http\Controllers\Admin\PesertaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Mahasiswa\ProfileController;
use App\Http\Controllers\Mahasiswa\SubmissionController;
use App\Http\Controllers\Mahasiswa\MahasiswaController;
use App\Http\Controllers\Superadmin\SuperadminController;

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
    return redirect(route('mahasiswa/login'));
});

//Route Login
Route::get('/admin/login', [AuthController::class, 'admin']);
Route::post('/admin/login', [AuthController::class, 'adminAuthenticate']);
Route::get('/mahasiswa/login', [AuthController::class, 'mahasiswa']);
Route::post('/mahasiswa/login', [AuthController::class, 'mahasiswaAuthenticate']);

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

Route::get('/mahasiswa/lomba', [MahasiswaController::class, 'index']);

Route::get('/mahasiswa/lomba/{lomba}', [MahasiswaController::class, 'show']);

Route::get('/register', function () {
    return view('register');
});

Route::get('/mahasiswa/profile/{$id}', [ProfileController::class, 'edit']);
Route::put('/mahasiswa/profile/{$id}', [ProfileController::class, 'update']);
Route::resource('admin/lomba', LombaController::class);

// Announcement route
Route::get('admin/announcement-admin', [LombaController::class, 'announ'])->name('announcement.admin');

//Task route
Route::get('admin/task-admin', [LombaController::class, 'task'])->name('task.admin');

Route::get('/mahasiswa/detailInfodanSubmit', function () {
    return view('app.mahasiswa.detailInfodanSubmit');
});

Route::get('/mahasiswa/submission', [SubmissionController::class, 'index']);
Route::post('mahasiswa/submission/store', [SubmissionController::class, 'store'])->name('FileUpload');
Route::post('mahasiswa/submission/file-delete', [SubmissionController::class, 'destroy']);


Route::get('/mahasiswa/{id}/submission', [SubmissionController::class, 'index']);
Route::post('/mahasiswa/submission/store', [SubmissionController::class, 'FileUpload'])->name('FileUpload');
Route::delete('/mahasiswa/submission/{id}', [SubmissionController::class, 'destroy'])->name('submission.destroy');
Route::post('/mahasiswa/submission', [SubmissionController::class, 'store'])->name('storeSubmission');



Route::get('/admin/peserta-lomba/{idLomba?}', [PesertaController::class, 'index']);

// export excel
Route::get('/peserta/export_excel/{idLomba?}', [PesertaController::class, 'export_excel']);

// Route Superadmin
Route::resource('/superadmin' , SuperadminController::class);