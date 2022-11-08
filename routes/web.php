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
Route::get('/', [App\Http\Controllers\DashboardController::class, 'dashboardSiswa'])->name('berandaSiswa');

Route::get('/login', function () {
    return view('auth/login')->name('login');
});

Auth::routes();

Route::group(['middleware' => ['auth','ceklevel:admin']], function () {
    
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');
    Route::post('/autofill', [App\Http\Controllers\PoinController::class, 'autofill'])->name('autofill');
    
    Route::get('/profile/{id}', [App\Http\Controllers\SiswaController::class, 'profile']);

    Route::get('/poin', [App\Http\Controllers\PoinController::class, 'index'])->name('catat');
    Route::get('/siswa', [App\Http\Controllers\SiswaController::class, 'index'])->name('siswa');
    Route::get('/riwayat', [App\Http\Controllers\RiwayatController::class, 'index'])->name('riwayat');

    Route::get('/awards', [App\Http\Controllers\AwardsController::class, 'index'])->name('awards');
    Route::post('/awards/tambah/', [App\Http\Controllers\AwardsController::class, 'tambah'])->name('catat_penghargaan');
    Route::post('/awards/edit/{id}', [App\Http\Controllers\AwardsController::class, 'edit']);
    Route::get('/awards/hapus/{id}', [App\Http\Controllers\AwardsController::class, 'hapus']);

    //Menu Data Master Penghargaan
    Route::get('/penghargaan', [App\Http\Controllers\PenghargaanController::class, 'index'])->name('penghargaan');
    Route::post('/penghargaan/tambah/', [App\Http\Controllers\PenghargaanController::class, 'tambah'])->name('tambah_penghargaan');
    Route::post('/penghargaan/edit/{id}', [App\Http\Controllers\PenghargaanController::class, 'edit']);
    Route::get('/penghargaan/hapus/{id}', [App\Http\Controllers\PenghargaanController::class, 'hapus']);

    Route::get('/pelanggaran', [App\Http\Controllers\PelanggaranController::class, 'index'])->name('pelanggaran');
    Route::post('/pelanggaran/tambah/', [App\Http\Controllers\PelanggaranController::class, 'tambah'])->name('tambah_pelanggaran');
    Route::post('/pelanggaran/edit/{id}', [App\Http\Controllers\PelanggaranController::class, 'edit']);
    Route::get('/pelanggaran/hapus/{id}', [App\Http\Controllers\PelanggaranController::class, 'hapus']);

    Route::get('/tindak', [App\Http\Controllers\TindakController::class, 'index'])->name('tindak');
    Route::post('/tindak/tambah/', [App\Http\Controllers\TindakController::class, 'tambah'])->name('tambah_tindak');
    Route::post('/tindak/edit/{id}', [App\Http\Controllers\TindakController::class, 'edit']);
    Route::get('/tindak/hapus/{id}', [App\Http\Controllers\TindakController::class, 'hapus']);
    
    Route::get('/riwayat/hapus/{id}', [App\Http\Controllers\RiwayatController::class, 'hapus']);
    
    Route::post('/siswa/tambah/', [App\Http\Controllers\SiswaController::class, 'tambah'])->name('tambah_siswa');
    Route::post('/siswa/edit/{id}', [App\Http\Controllers\SiswaController::class, 'edit']);
    Route::get('/siswa/hapus/{id}', [App\Http\Controllers\SiswaController::class, 'hapus']);
    Route::get('/siswa/profile/{id}', [App\Http\Controllers\SiswaController::class, 'profile']);
    Route::post('/siswa/import_excel', [App\Http\Controllers\SiswaController::class, 'import_excel']);
    Route::get('/siswa/cetak_pdf/{id}', [App\Http\Controllers\SiswaController::class, 'cetak_pdf']);

    Route::post('/poin/tambah/', [App\Http\Controllers\PoinController::class, 'tambah'])->name('catat_pelanggaran');
    Route::post('/poin/edit/{id}', [App\Http\Controllers\PoinController::class, 'edit']);
    Route::get('/poin/hapus/{id}', [App\Http\Controllers\PoinController::class, 'hapus']);
    Route::get('/poin/reset', [App\Http\Controllers\PoinController::class, 'reset']);

    Route::get('/ringan', [App\Http\Controllers\PenangananController::class, 'ringan'])->name('ringan');
    Route::get('/sedang', [App\Http\Controllers\PenangananController::class, 'sedang'])->name('sedang');
    Route::get('/berat', [App\Http\Controllers\PenangananController::class, 'berat'])->name('berat');
    Route::get('/penanganan/edit/{id}', [App\Http\Controllers\PenangananController::class, 'edit']);
});

// Route::group(['middleware' => ['auth','ceklevel:user']], function () {
    
//     Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard']);
// });
