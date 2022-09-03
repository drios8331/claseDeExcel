<?php

use App\Http\Controllers\BodegasController;
use App\Http\Controllers\CarrosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductorasController;
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


Route::get('/', HomeController::class)->name('home');

Route::get('carros', [CarrosController::class, 'viewCarros'])->name('carros');
Route::get('productoras', [ProductorasController::class, 'viewProductoras'])->name('productoras');
Route::get('bodegas', [BodegasController::class, 'viewBodegas'])->name('bodegas');
