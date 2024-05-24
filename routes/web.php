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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//route daftar user
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index')->middleware('admin');
Route::get('/user/tambah', [App\Http\Controllers\UserController::class, 'create'])->name('user.create')->middleware('admin');
Route::post('/user/tambah', [App\Http\Controllers\UserController::class, 'store'])->name('user.store')->middleware('admin');
Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit')->middleware('admin');
Route::put('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update')->middleware('admin');

Route::delete('/user/hapus/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.delete')->middleware('admin');

// route untuk guru
Route::get('/guru', [App\Http\Controllers\GuruController::class, 'index'])->name('guru.index');
Route::get('/guru/tambah', [App\Http\Controllers\GuruController::class, 'create'])->name('guru.create');
Route::get('/guru/detail/{id}', [App\Http\Controllers\GuruController::class, 'show'])->name('guru.show');
Route::get('/guru/edit/{id}', [App\Http\Controllers\GuruController::class, 'edit'])->name('guru.edit');
Route::put('/guru/edit/{id}', [App\Http\Controllers\GuruController::class, 'update'])->name('guru.update');
Route::post('/guru/tambah', [App\Http\Controllers\GuruController::class, 'store'])->name('guru.store');
Route::delete('/guru/hapus/{id}', [App\Http\Controllers\GuruController::class, 'destroy'])->name('guru.delete');

// route untuk gaji
Route::get('/gaji', [App\Http\Controllers\GajiController::class, 'index'])->name('gaji.index');
Route::get('/gaji/tambah', [App\Http\Controllers\GajiController::class, 'create'])->name('gaji.create');
Route::get('/gaji/detail/{id}', [App\Http\Controllers\GajiController::class, 'show'])->name('gaji.detail');
Route::post('/gaji/tambah', [App\Http\Controllers\GajiController::class, 'store'])->name('gaji.store');
Route::delete('/gaji/hapus/{id}', [App\Http\Controllers\GajiController::class, 'destroy'])->name('gaji.delete');

//route untuk tunjangan
Route::get('/tunjangan', [App\Http\Controllers\TunjanganController::class, 'index'])->name('tunjangan.index');
Route::get('/tunjangan/edit/{id}', [App\Http\Controllers\TunjanganController::class, 'edit'])->name('tunjangan.edit');
Route::get('/tunjangan', [App\Http\Controllers\TunjanganController::class, 'index'])->name('tunjangan.index');
Route::post('/tunjangan/edit/{id}', [App\Http\Controllers\TunjanganController::class, 'update'])->name('tunjangan.update');
Route::get('/tunjangan/tambah', [App\Http\Controllers\TunjanganController::class, 'create'])->name('tunjangan.create');
Route::post('/tunjangan/tambah', [App\Http\Controllers\TunjanganController::class, 'store'])->name('tunjangan.store');
Route::delete('/tunjangan/hapus/{id}', [App\Http\Controllers\TunjanganController::class, 'destroy'])->name('tunjangan.delete');
Route::put('/tunjangan/edit/{id}', [App\Http\Controllers\TunjanganController::class, 'update'])->name('tunjangan.update');

//route untuk potongan
Route::get('/potongan', [App\Http\Controllers\PotonganController::class, 'index'])->name('potongan.index');
Route::get('/potongan/edit/{id}', [App\Http\Controllers\PotonganController::class, 'edit'])->name('potongan.edit');
Route::get('/potongan', [App\Http\Controllers\PotonganController::class, 'index'])->name('potongan.index');
Route::post('/potongan/edit/{id}', [App\Http\Controllers\PotonganController::class, 'update'])->name('potongan.update');
Route::get('/potongan/tambah', [App\Http\Controllers\PotonganController::class, 'create'])->name('potongan.create');
Route::post('/potongan/tambah', [App\Http\Controllers\PotonganController::class, 'store'])->name('potongan.store');
Route::delete('/potongan/hapus/{id}', [App\Http\Controllers\PotonganController::class, 'destroy'])->name('potongan.delete');
Route::put('/potongan/edit/{id}', [App\Http\Controllers\PotonganController::class, 'update'])->name('potongan.update');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('akun', App\Http\Controllers\AkunController::class);
});

Route::resource('jurnal', App\Http\Controllers\JurnalController::class);

Route::get('/cetak-gaji/{id}', [App\Http\Controllers\CetakGajiController::class, 'cetak'])->name('cetak');

Route::get('/jurnal-laporan', [App\Http\Controllers\JurnalLaporanController::class, 'index'])->name('jurnal.laporan');

Route::post('/jurnal-laporan-pdf', [App\Http\Controllers\JurnalLaporanController::class, 'JurnalPdf'])->name('jurnal.laporan.pdf');
