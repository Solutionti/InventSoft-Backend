<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\InventariosController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\SeguridadController; //aca se pone el controlador que se va a utilizar


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

Route::controller(InventariosController::class)->group(function () {
    Route::get('getProductos', 'getProductos');  // para mostrar o consultar datos
    //Route::post('countPatients', 'countPatients'); // para guardar datos
    Route::get('getCategorias', 'getCategorias');
    Route::get('getProductoKardex', 'getProductoKardex');
    Route::get('getProductoStock', 'getProductoStock');
    Route::get('getProductStock', 'getProductStock');

    Route::post('postAgregarProductos', 'postAgregarProductos');
    Route::post('entradaKardex', 'entradaKardex');
    Route::post('salidakardex', 'salidakardex');
});
    //Ventas
    Route::controller(VentasController::class)->group(function (){
    Route::get('getPedido', 'getPedido');
    Route::get('getCompras', 'getCompras');

    Route::post('getComprasInsert', 'getComprasInsert');
});
    //seguridad
    Route::controller(SeguridadController::class)->group(function (){
    Route::get('getUsuarios', 'getUsuarios');


});

