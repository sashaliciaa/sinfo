<?php

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

request()->routeIs();
Route::resource('dashboard', App\Http\Controllers\DashboardController::class);
Route::resource('perangkatdesa', App\Http\Controllers\PerangkatDesaController::class);
Route::resource('agendakegiatan', App\Http\Controllers\AgendaKegiatanController::class);
Route::resource('pertanian', App\Http\Controllers\PertanianController::class);
Route::resource('perkebunan', App\Http\Controllers\PerkebunanController::class);
Route::resource('peternakan', App\Http\Controllers\PeternakanController::class);
Route::resource('perikanan', App\Http\Controllers\PerikananController::class);
