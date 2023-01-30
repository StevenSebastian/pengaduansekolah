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

Route::resource('siswa', SiswaController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('pelaporan', PelaporanController::class);
Route::resource('/', PelaporanController::class);
Route::get('/pelaporanlist', 'PelaporanController@list')->name('list');
Route::resource('aspirasi', AspirasiController::class);


