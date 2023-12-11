<?php

use App\Http\Controllers\AgendaKegiatanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PerangkatDesaController;
use App\Http\Controllers\PerkebunanController;
use App\Http\Controllers\PertanianController;
use App\Http\Controllers\PeternakanController;

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
    return view('landingpage.index');
});

Auth::routes();

Route::resource('dashboard', DashboardController::class);
Route::resource('jabatan', JabatanController::class);
Route::resource('perangkatdesa', PerangkatDesaController::class);
Route::resource('agendakegiatan', AgendaKegiatanController::class);
Route::resource('/pekerjaan_desa/pertanian', PertanianController::class);
Route::resource('/pekerjaan_desa/perkebunan', PerkebunanController::class);
Route::resource('/pekerjaan_desa/peternakan', PeternakanController::class);
Route::resource('/pekerjaan_desa/perikanan', PerikananController::class);
Route::resource('/galeri', GaleriController::class);

Route::get('/peternakan/print-report', [PeternakanController::class, 'printReport'])->name('peternakan.printReport');
