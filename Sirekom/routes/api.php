<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Admin\PesertaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::controller(LoginController::class)->group(function () {
//     Route::post('login', 'adminLoginAPI');
//     Route::post('logout', 'adminLogoutAPI')->middleware('auth:api');
//     Route::post('refresh', 'refresh')->middleware('auth:api');
//     // Route::get('peserta/{idLomba?}', [PesertaController::class, 'index']);
//     // Route::get('peserta/{idLomba?}', [PesertaController::class, 'index'])->middleware('auth:api');
// });


// Route::controller(PesertaController::class)->group(function () {
//     Route::get('peserta', 'index');
// });

// Route::post('/register', [LoginkuController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('peserta/{idLomba?}', [PesertaController::class, 'index']);
});
