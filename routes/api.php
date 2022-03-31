<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::resource('kategoris', App\Http\Controllers\API\KategoriAPIController::class);


Route::resource('gudangs', App\Http\Controllers\API\GudangAPIController::class);




Route::resource('barangs', App\Http\Controllers\API\BarangAPIController::class);


Route::resource('riwayats', App\Http\Controllers\API\RiwayatAPIController::class);
