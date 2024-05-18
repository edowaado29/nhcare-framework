<?php

use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KedonaturanController;
use App\Http\Controllers\PengasuhController;
use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard/dashboard');
});

//Route Kedonaturan
Route::get('/kedonaturan', [KedonaturanController::class, 'kedonaturan'])->name('kedonaturan');
Route::get('/detail_donatur', [KedonaturanController::class, 'detail_donatur']);
Route::get('/tambah_donatur', [KedonaturanController::class, 'tambah_donatur'])->name('tambah_donatur');
Route::post('/tambahDon', [KedonaturanController::class, 'tambahDon'])->name('tambahDon');
Route::get('/edit_donatur/{id}', [KedonaturanController::class, 'edit_donatur'])->name('edit_donatur');
Route::put('/update_donatur/{id}', [KedonaturanController::class, 'update_donatur'])->name('update_donatur');
Route::delete('/hapus_donatur/{id}', [KedonaturanController::class, 'hapus_donatur'])->name('hapus_donatur');


Route::get('/anakasuh', function () {
    return view('anakasuh/anakasuh');
});

Route::get('/donasi', function () {
    return view('donasi/donasi');
});

//Route Jabatan
Route::get('/jabatan', [JabatanController::class, 'jabatan'])->name('jabatan');
Route::get('/tambah_jabatan', [JabatanController::class, 'tambah_jabatan'])->name('tambah_jabatan');
Route::post('/tambahJabat', [JabatanController::class, 'tambahJabat'])->name('tambahJabat');
Route::get('/edit_jabatan/{id}', [JabatanController::class, 'edit_jabatan'])->name('edit_jabatan');
Route::put('/update_jabatan/{id}', [JabatanController::class, 'update_jabatan'])->name('update_jabatan');
Route::delete('/hapus_jabatan/{id}', [JabatanController::class, 'hapus_jabatan'])->name('hapus_jabatan');

//route pengasuh
Route::get('/pengasuh', [PengasuhController::class, 'pengasuh'])->name('pengasuh');
Route::get('/tambah_pengasuh', [PengasuhController::class, 'tambah_pengasuh'])->name('tambah_pengasuh');
Route::post('/tambahPeng', [PengasuhController::class, 'tambahPeng'])->name('tambahPeng');
Route::get('/edit_pengasuh/{id}', [PengasuhController::class, 'edit_pengasuh'])->name('edit_pengasuh');
Route::put('/update_pengasuh/{id}', [PengasuhController::class, 'update_pengasuh'])->name('update_pengasuh');
Route::delete('/hapus_pengasuh/{id}', [PengasuhController::class, 'hapus_pengasuh'])->name('hapus_pengasuh');


Route::get('/acara', function () {
    return view('agenda/acara');
});

Route::get('/absensi', function () {
    return view('agenda/absensi');
});

Route::get('/artikel', function () {
    return view('layanan/artikel');
});

// Route::get('/program', function () {
//     return view('layanan/program');
// });

// Route::get('/tambah_program', function () {
//     return view('layanan/tambah_program');
// });

// Route::get('/edit_program', function () {
//     return view('layanan/edit_program');
// });

Route::get('/program', [ProgramController::class, 'program'])->name('program');
Route::get('/detail_program', [ProgramController::class, 'detail_program']);

Route::get('/tambah_program', [ProgramController::class, 'tambah_program'])->name('tambah_program');

Route::post('/tambah', [ProgramController::class, 'tambah'])->name('tambah');
Route::get('/edit_program/{id}', [ProgramController::class, 'edit_program'])->name('edit_program');

Route::put('/update/{id}', [ProgramController::class, 'update'])->name('update');
Route::delete('/hapus_program/{id}', [ProgramController::class, 'hapus_program'])->name('hapus_program');


Route::get('/profile', function () {
    return view('profile/profile');
});