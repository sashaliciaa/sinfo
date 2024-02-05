<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PerikananController;
use App\Http\Controllers\PertanianController;
use App\Http\Controllers\PerkebunanController;
use App\Http\Controllers\PeternakanController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\PerangkatDesaController;
use App\Http\Controllers\AgendaKegiatanController;
use App\Http\Controllers\MeubelController;
use App\Http\Controllers\StrukturOrganisasiController;

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

Auth::routes();

Route::resource('/', LandingpageController::class);

Route::resource('dashboard', DashboardController::class);
Route::resource('jabatan', JabatanController::class);
Route::resource('perangkatdesa', PerangkatDesaController::class);
Route::resource('agendakegiatan', AgendaKegiatanController::class);
Route::resource('/potensi_desa/pertanian', PertanianController::class);
Route::resource('/potensi_desa/perkebunan', PerkebunanController::class);
Route::resource('/potensi_desa/peternakan', PeternakanController::class);
Route::resource('/potensi_desa/perikanan', PerikananController::class);
Route::resource('/potensi_desa/meubel', MeubelController::class);
Route::resource('/galeri', GaleriController::class);
Route::resource('/struktur', StrukturOrganisasiController::class);

Route::get('/peternakan/print-report', [PeternakanController::class, 'printReport'])->name('peternakan.printReport');
Route::get('/pertanian/print-report', [PertanianController::class, 'printReport'])->name('pertanian.printReport');
Route::get('/perkebunan/print-report', [PerkebunanController::class, 'printReport'])->name('perkebunan.printReport');
Route::get('/perikanan/print-report', [PerikananController::class, 'printReport'])->name('perikanan.printReport');
Route::get('/meubel/print-report', [MeubelController::class, 'printReport'])->name('meubel.printReport');

Route::get('/galeri-show', [LandingpageController::class, 'galeriShow'])->name('galeri.show');
Route::get('/agenda-show', [LandingpageController::class, 'agendaShow'])->name('agenda.show');
Route::get('/struktur-status/{id}', [StrukturOrganisasiController::class, 'strukturStatus'])->name('struktur.status');
