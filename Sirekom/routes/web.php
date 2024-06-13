<?php

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\LombaController;
use App\Http\Controllers\Admin\PesertaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Mahasiswa\ProfileController;
use App\Http\Controllers\Mahasiswa\MahasiswaController;
use App\Http\Controllers\Mahasiswa\SubmissionController;
use App\Http\Controllers\Superadmin\SuperadminController;
use App\Http\Controllers\Api\PesertaController as ApiPesertaController;

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
//     return redirect(route('mahasiswa/login'));
// });

//Route Login
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/', [AuthController::class, 'RoleAuth']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register']);


route::middleware(['auth:admin', 'role:admin'])->group(function () {
    Route::get('/admin/create-lomba', function () {
        return view('app.admin.create');
    });
    Route::get('/admin/dashboard', [DashboardController::class, 'index']);

    Route::resource('/admin/lomba', LombaController::class);

    Route::get('/peserta/export_excel/{idLomba?}', [PesertaController::class, 'export_excel']);

    //Route::get('/admin/peserta-lomba/{idLomba?}', [PesertaController::class, 'index']);
    Route::get('/admin/peserta-lomba/{idLomba?}', [ApiPesertaController::class, 'memanggilAPIGetAlldata']);
});


route::middleware(['auth:mahasiswa', 'role:mahasiswa'])->group(function () {
    Route::get('/mahasiswa/{id}/submission', [SubmissionController::class, 'index']);
    Route::post('/mahasiswa/submission/store', [SubmissionController::class, 'FileUpload'])->name('FileUpload');
    Route::delete('/mahasiswa/submission/{id}', [SubmissionController::class, 'destroy'])->name('submission.destroy');
    Route::post('/mahasiswa/submission', [SubmissionController::class, 'store'])->name('storeSubmission');

    Route::get('/mahasiswa/lomba', [MahasiswaController::class, 'index'])->name('mahasiswa.lomba');
    Route::post('/mahasiswa/lomba/{idLomba}', [MahasiswaController::class, 'register'])->name('mahasiswa.lomba.register');
    Route::get('/mahasiswa/lomba/{lomba}', [MahasiswaController::class, 'show'])->name('mahasiswa.lomba.show');

    Route::get('/mahasiswa/profile', function () {
        return view('app.mahasiswa.profile');
    });

    Route::get('/mahasiswa/profile/{$id}', [ProfileController::class, 'edit']);
    Route::put('/mahasiswa/profile/{$id}', [ProfileController::class, 'update']);

    Route::get('/mahasiswa/detailInfodanSubmit', function () {
        return view('app.mahasiswa.detailInfodanSubmit');
    });

});

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

// Route::get('/mahasiswa/lomba', [MahasiswaController::class, 'index']);
// Route::post('/mahasiswa/lomba/{idLomba}', [MahasiswaController::class, 'register'])->name('mahasiswa.register');
// Route::get('/mahasiswa/lomba/{lomba}', [MahasiswaController::class, 'show'])->name('mahasiswa.lomba.show');


// Route::get('/', function () {
//     return view('login');
// });


// Announcement route
Route::get('admin/announcement-admin', [LombaController::class, 'announ'])->name('announcement.admin');

//Task route
// Route::resource('tasks', TaskController::class);

// List all tasks
Route::get('admin/list-task', [TaskController::class, 'index'])->name('tasks.index');
Route::get('admin/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('admin/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('admin/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
Route::get('admin/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('admin/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('admin/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');


// export excel

Route::get('/peserta/export_excel/{idLomba?}', [ApiPesertaController::class, 'export_excel']);

// Route::get('/peserta/lomba/{idLomba}', [PesertaController::class, 'getPesertaByLomba'])->name('peserta.lomba');


