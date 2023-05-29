<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });    

    Route::post('/logout',[AuthController::class,'logout']);

    //ALMACENAR ORDENES
    Route::apiResource('/pedidos',PedidoController::class);

    Route::apiResource('/categorias', CategoriaController::class);
    
    Route::apiResource('/productos', ProductoController::class);

    
});

Route::get('/pedidos', [PedidoController::class, 'index'])->middleware('auth:sanctum');

Route::put('/productos/{producto}/agotado', 'App\Http\Controllers\ProductoController@handleClickProductoAgotado');

Route::put('/productos/{producto}/update', 'App\Http\Controllers\ProductoController@handleClickProductoUpdate');
    
Route::put('/productos/{producto}/updatestock', 'App\Http\Controllers\ProductoController@handleClickProductoStock');


/* Route::apiResource('/pedidos',PedidoController::class);

Route::apiResource('/categorias', CategoriaController::class);
    
Route::apiResource('/productos', ProductoController::class); */















//AUTENTICAZION

Route::post('/registro',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);



