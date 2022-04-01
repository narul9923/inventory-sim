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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('kategoris', App\Http\Controllers\KategoriController::class);


Route::resource('gudangs', App\Http\Controllers\GudangController::class);




Route::resource('barangs', App\Http\Controllers\BarangController::class);


Route::resource('riwayats', App\Http\Controllers\RiwayatController::class);
