<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("/", function(){
    return response()->json(["mensaje" => "Hola este proyecto es un Backend API"], 200);
});

// Rutas de Authenticación
Route::prefix('/v1/auth')->group(function(){

    Route::post("login", [ApiAuthController::class, "funLogin"]);
    Route::post("register", [ApiAuthController::class, "funRegister"]);
    
    Route::middleware('auth:sanctum')->group(function(){
        Route::get("profile", [ApiAuthController::class, "funProfile"]);
        Route::post('logout', [ApiAuthController::class, 'funLogout']);
    });

});


Route::middleware('auth:sanctum')->group(function(){

    // CRUD
    Route::apiResource("categoria", CategoriaController::class);
    Route::apiResource("producto", ProductoController::class);
    Route::apiResource("user", UserController::class);
    Route::apiResource("orden", OrdenController::class);


});