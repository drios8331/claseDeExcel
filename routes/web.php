<?php

use App\Http\Controllers\BodegasController;
use App\Http\Controllers\CarrosController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductorasController;
use App\Http\Controllers\PruebasController;
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

//Reservas
Route::get("reserva/{idCarro}/modalCreate", [ReservasController::class, 'modalCreate']);
Route::get("reserva/{idCarro}/create", [ReservasController::class, 'createReserva']);

//Pruebas
Route::get('pruebas', [PruebasController::class, 'viewPruebas']);
Route::get('pruebas', [PruebasController::class, 'pruebas']);

//Carros
Route::get('carros', [CarrosController::class, 'viewCarros']);
Route::post("carro/create", [CarrosController::class, 'createCarros']);
Route::get("carro/{idVehiculo}/info", [CarrosController::class, 'infoCarros']);
Route::get("carro/{idVehiculo}/editCarro", [CarrosController::class, 'editCarro']);
Route::post('carro/{idCarro}', [CarrosController::class, 'UpdateCarro']);

//Productoras
Route::get('configuracion', [ConfiguracionController::class, 'viewConfiguracion']);
Route::post('produtora/modalRegistroProductora', [ConfiguracionController::class, 'modalInsertarProductora']);
Route::post("produtora/create", [ConfiguracionController::class, 'createProductora']);
Route::get("produtora/{id}/info", [ConfiguracionController::class, 'infoProductora']);
Route::get("produtora/{id}/editProductora", [ConfiguracionController::class, 'editProductora']);
Route::post('produtora/{idProd}', [ConfiguracionController::class, 'UpdateProductora']);

//Bodegas
Route::post("bodega/modalInsertarBodega", [ConfiguracionController::class, 'modalInsertarBodega']);
Route::post("bodega/create", [ConfiguracionController::class, 'createBodega']);
Route::post('bodega/{idBod}', [ConfiguracionController::class, 'updateBodega']);
Route::get("bodega/{idBodega}/infoBodega", [ConfiguracionController::class, 'infoBodega']);
Route::get("bodega/{idBodega}/editBodega", [ConfiguracionController::class, 'editBodega']);


