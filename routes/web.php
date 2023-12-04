<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PerangkatDesaController;
use App\Http\Controllers\PerangkatdesaController as ControllersPerangkatdesaController;

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
Route::resource('perangkatdesa', PerangkatDesaController::class);
