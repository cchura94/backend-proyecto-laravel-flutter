<?php

use App\Http\Controllers\ApiAuthController;
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
