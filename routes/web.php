<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend/index');
});

Route::get('/login', function () {
    return view('auth/login')->name('login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard']);
    Route::get('/profile', [App\Http\Controllers\DashboardController::class, 'profile']);
    // Route::post('/autofill', [App\Http\Controllers\PoinController::class, 'autofill'])->name('autofill');
    
    Route::get('/profile/{id}', [App\Http\Controllers\SiswaController::class, 'profile']);

    Route::get('/poin', [App\Http\Controllers\PoinController::class, 'index']);
    Route::get('/siswa', [App\Http\Controllers\SiswaController::class, 'index']);
    Route::get('/riwayat', [App\Http\Controllers\RiwayatController::class, 'index']);
    
    Route::get('/riwayat/hapus/{id}', [App\Http\Controllers\RiwayatController::class, 'hapus']);
    
    Route::get('/siswa/tambah', [App\Http\Controllers\SiswaController::class, 'tambah']);
    Route::post('/siswa/tambah/proses', [App\Http\Controllers\SiswaController::class, 'tambah']);
    Route::post('/siswa/edit/{id}', [App\Http\Controllers\SiswaController::class, 'edit']);
    Route::get('/siswa/hapus/{id}', [App\Http\Controllers\SiswaController::class, 'hapus']);
    Route::get('/siswa/profile/{id}', [App\Http\Controllers\SiswaController::class, 'profile']);
    Route::post('/siswa/import_excel', [App\Http\Controllers\SiswaController::class, 'import_excel']);
    Route::get('/siswa/cetak_pdf/{id}', [App\Http\Controllers\SiswaController::class, 'cetak_pdf']);

    Route::get('/poin/tambah', [App\Http\Controllers\PoinController::class, 'tambah']);
    Route::post('/poin/tambah/proses', [App\Http\Controllers\PoinController::class, 'tambah']);
    Route::post('/poin/edit/{id}', [App\Http\Controllers\PoinController::class, 'edit']);
    Route::get('/poin/hapus/{id}', [App\Http\Controllers\PoinController::class, 'hapus']);
    Route::get('/poin/reset', [App\Http\Controllers\PoinController::class, 'reset']);

    Route::get('/ringan', [App\Http\Controllers\PenangananController::class, 'ringan']);
    Route::get('/sedang', [App\Http\Controllers\PenangananController::class, 'sedang']);
    Route::get('/berat', [App\Http\Controllers\PenangananController::class, 'berat']);
    Route::get('/penanganan/edit/{id}', [App\Http\Controllers\PenangananController::class, 'edit']);
});
