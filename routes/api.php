<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\InventariosController;

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
    Route::post('postAgregarProductos', 'postAgregarProductos');
});

