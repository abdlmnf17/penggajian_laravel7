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
Route::get('/guru', [App\Http\Controllers\GuruController::class, 'index'])->name('guru.index');
Route::get('/guru/tambah', [App\Http\Controllers\GuruController::class, 'create'])->name('guru.create');
Route::get('/guru/edit/{id}', [App\Http\Controllers\GuruController::class, 'edit'])->name('guru.edit');
Route::post('/guru/tambah', [App\Http\Controllers\GuruController::class, 'store'])->name('guru.store');
Route::delete('/guru/{id}', [App\Http\Controllers\GuruController::class, 'destroy'])->name('guru.delete');


