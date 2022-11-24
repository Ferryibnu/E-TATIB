<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use LaravelJsonApi\Laravel\Facades\JsonApiRoute;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/kelas', [App\Http\Controllers\Api\KelasController::class, 'index']);
Route::post('/kelas/tambah/', [App\Http\Controllers\Api\KelasController::class, 'tambah']);
Route::post('/kelas/edit/{id}', [App\Http\Controllers\Api\KelasController::class, 'edit']);
Route::delete('/kelas/hapus/{id}', [App\Http\Controllers\Api\KelasController::class, 'hapus']);

Route::get('/siswa', [App\Http\Controllers\Api\SiswaController::class, 'index']);
Route::post('/siswa/tambah/', [App\Http\Controllers\Api\SiswaController::class, 'tambah']);
Route::post('/siswa/edit/{id}', [App\Http\Controllers\Api\SiswaController::class, 'edit']);
Route::delete('/siswa/hapus/{id}', [App\Http\Controllers\Api\SiswaController::class, 'hapus']);

Route::get('/poin', [App\Http\Controllers\Api\PoinController::class, 'index']);
Route::post('/poin/tambah/', [App\Http\Controllers\Api\PoinController::class, 'tambah']);
Route::post('/poin/edit/{id}', [App\Http\Controllers\Api\PoinController::class, 'edit']);
Route::delete('/poin/hapus/{id}', [App\Http\Controllers\Api\PoinController::class, 'hapus']);

Route::get('/pelanggaran', [App\Http\Controllers\Api\PelanggaranController::class, 'index']);
Route::post('/pelanggaran/tambah/', [App\Http\Controllers\Api\PelanggaranController::class, 'tambah']);
Route::post('/pelanggaran/edit/{id}', [App\Http\Controllers\Api\PelanggaranController::class, 'edit']);
Route::delete('/pelanggaran/hapus/{id}', [App\Http\Controllers\Api\PelanggaranController::class, 'hapus']);

Route::get('/penghargaan', [App\Http\Controllers\Api\PenghargaanController::class, 'index']);
Route::post('/penghargaan/tambah/', [App\Http\Controllers\Api\PenghargaanController::class, 'tambah']);
Route::post('/penghargaan/edit/{id}', [App\Http\Controllers\Api\PenghargaanController::class, 'edit']);
Route::delete('/penghargaan/hapus/{id}', [App\Http\Controllers\Api\PenghargaanController::class, 'hapus']);

Route::get('/user', [App\Http\Controllers\Api\UserController::class, 'index']);
Route::post('/user/tambah/', [App\Http\Controllers\Api\UserController::class, 'tambah']);
Route::delete('/user/hapus/{id}', [App\Http\Controllers\Api\UserController::class, 'hapus']);

Route::get('/awards', [App\Http\Controllers\Api\AwardsController::class, 'index']);
Route::post('/awards/tambah/', [App\Http\Controllers\Api\AwardsController::class, 'tambah']);
Route::post('/awards/edit/{id}', [App\Http\Controllers\Api\AwardsController::class, 'edit']);
Route::delete('/awards/hapus/{id}', [App\Http\Controllers\Api\AwardsController::class, 'hapus']);

Route::get('/ringan', [App\Http\Controllers\Api\PenangananController::class, 'ringan']);
Route::get('/sedang', [App\Http\Controllers\Api\PenangananController::class, 'sedang']);
Route::get('/berat', [App\Http\Controllers\Api\PenangananController::class, 'berat']);

Route::get('/tindak', [App\Http\Controllers\Api\TindakController::class, 'index']);
Route::post('/tindak/tambah/', [App\Http\Controllers\Api\TindakController::class, 'tambah']);
Route::post('/tindak/edit/{id}', [App\Http\Controllers\Api\TindakController::class, 'edit']);
Route::delete('/tindak/hapus/{id}', [App\Http\Controllers\Api\TindakController::class, 'hapus']);
