<?php

use App\Http\Controllers\Api\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\PesertaController;
use App\Models\Admin;

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

Route::controller(LoginController::class)->group(function () {
    Route::post('login', 'adminLoginAPI');
    Route::post('logout', 'adminLogoutAPI')->middleware('auth:sanctum');
    Route::post('refresh', 'refresh')->middleware('auth:sanctum');
});
Route::middleware('auth:sanctum')->group(function () {
    Route::get('peserta/{idLomba?}', [PesertaController::class, 'index'])->middleware('auth:api');
});

Route::controller(AdminController::class)->group(function () {
    Route::put('admin/{data}', 'store');
    Route::put('admin/{data}', 'update');
});
