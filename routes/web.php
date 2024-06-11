<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KedonaturanController;
use App\Http\Controllers\PengasuhController;
use App\Http\Controllers\AcaraController;
use App\Http\Controllers\AnakasuhController;
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

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware('isLoggedIn');

//Route Kedonaturan
Route::get('/kedonaturan', [KedonaturanController::class, 'kedonaturan'])->name('kedonaturan');
Route::get('/detail_donatur/{id}', [KedonaturanController::class, 'detail_donatur'])->name('detail_donatur');
Route::get('/tambah_donatur', [KedonaturanController::class, 'tambah_donatur'])->name('tambah_donatur');
Route::post('/tambahDon', [KedonaturanController::class, 'tambahDon'])->name('tambahDon');
Route::get('/edit_donatur/{id}', [KedonaturanController::class, 'edit_donatur'])->name('edit_donatur');
Route::put('/update_donatur/{id}', [KedonaturanController::class, 'update_donatur'])->name('update_donatur');
Route::delete('/hapus_donatur/{id}', [KedonaturanController::class, 'hapus_donatur'])->name('hapus_donatur');

// Route Anak Asuh
Route::get('/anakasuh', [AnakasuhController::class, 'anakasuh'])->name('anakasuh');
Route::get('/tambah_anakasuh', [AnakasuhController::class, 'tambah_anakasuh'])->name('tambah_anakasuh');
Route::post('/tambahAnk', [AnakasuhController::class, 'tambahAnk'])->name('tambahAnk');
Route::delete('/hapus_anakasuh/{id_anakasuh}', [AnakasuhController::class, 'hapus_anakasuh'])->name('hapus_anakasuh');
Route::get('/edit_anakasuh/{id_anakasuh}', [AnakasuhController::class, 'edit_anakasuh'])->name('edit_anakasuh');
Route::put('/update_anakasuh/{id_anakasuh}', [AnakasuhController::class, 'update_anakasuh'])->name('update_anakasuh');

// Route Donasi
Route::get('/donasi', [DonasiController::class, 'donasi'])->name('donasi');
Route::get('/detail_donasi', [DonasiController::class, 'detail_donasi']);

Route::get('/ranking', function () {
    return view('asuhan/ranking');
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

//route acara
Route::get('/acara', [AcaraController::class, 'acara'])->name('acara');
Route::get('/detail_acara', [AcaraController::class, 'detail_acara']);
Route::get('/tambah_acara', [AcaraController::class, 'tambah_acara'])->name('tambah_acara');
Route::post('/tambahAcr', [AcaraController::class, 'tambahAcr'])->name('tambahAcr');
Route::get('/edit_acara/{id}', [AcaraController::class, 'edit_acara'])->name('edit_acara');
Route::put('/updateAcr/{id}', [AcaraController::class, 'updateAcr'])->name('updateAcr');
Route::delete('/hapus_acara/{id}', [AcaraController::class, 'hapus_acara'])->name('hapus_acara');

//route artikel
Route::get('/artikel', [ArtikelController::class, 'artikel'])->name('artikel');
Route::get('/detail_artikel', [ArtikelController::class, 'detail_artikel']);
Route::get('/tambah_artikel', [ArtikelController::class, 'tambah_artikel'])->name('tambah_artikel');
Route::post('/tambah_artkl', [ArtikelController::class, 'tambah_artkl'])->name('tambah_artkl');
Route::get('/edit_artikel/{id}', [ArtikelController::class, 'edit_artikel'])->name('edit_artikel');
Route::put('/update_artikel/{id}', [ArtikelController::class, 'update_artikel'])->name('update_artikel');
Route::delete('/hapus_artikel/{id}', [ArtikelController::class, 'hapus_artikel'])->name('hapus_artikel');

//route program
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

// route auth
Route::controller(AuthController::class)->group(function(){
    Route::get('/login','login')->middleware('alreadyLoggedIn');
    Route::post('/loginUser','loginUser')->name('loginUser');
    Route::get('/logout','logout');
});