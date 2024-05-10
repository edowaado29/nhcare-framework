<?php

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

Route::get('/kedonaturan', function () {
    return view('kedonaturan/kedonaturan');
});

Route::get('/anakasuh', function () {
    return view('anakasuh/anakasuh');
});

Route::get('/donasi', function () {
    return view('donasi/donasi');
});

Route::get('/jabatan', function () {
    return view('kepegawaian/jabatan');
});

Route::get('/pegawai', function () {
    return view('kepegawaian/pegawai');
});

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