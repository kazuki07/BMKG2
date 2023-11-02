<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\CuacaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PimpinanController;
use App\Http\Controllers\RunningController;
use App\Http\Controllers\WeatherAPIController;
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
    return view('home');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get("/cuaca", [CuacaController::class, "getDataCuaca"]);

Route::get('/weather', [WeatherAPIController::class, 'consume']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
