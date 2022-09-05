<?php

use App\Http\Controllers\BodegasController;
use App\Http\Controllers\CarrosController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductorasController;
use App\Http\Controllers\ReservasController;
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

//home
Route::get('/', HomeController::class)->name('home');

//Carros
Route::get('carros', [CarrosController::class, 'viewCarros'])->name('carros');

//Productoras
Route::get('configuracion', [ConfiguracionController::class, 'viewConfiguracion'])->name('configuracion');
Route::post('configuracion/modalRegistroProductora', [ConfiguracionController::class, 'modalInsertarProductora'])->name('configuracion/modalRegistroProductora');
Route::post('configuracion/create', [ConfiguracionController::class, 'createProductora'])->name('configuracion/create');
Route::get("configuracion/{infoProductora}", [ConfiguracionController::class, 'editProductora'])->name("configuracion/edit");

//Bodegas
// Route::get('configuracion', [BodegasController::class, 'viewBodegas'])->name('bodega');
Route::post('configuracion/modalRegistroBodega', [ConfiguracionController::class, 'modalInsertarBodega'])->name('configuracion/modalRegistroBodega');
Route::post('bodega/create', [ConfiguracionController::class, 'createBodega'])->name('bodega/create');

//Reservas
// Route::get('reservas', [ReservasController::class, 'viewReservas'])->name('reservas');
