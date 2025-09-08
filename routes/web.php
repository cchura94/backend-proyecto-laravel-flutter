<?php

use App\Http\Controllers\Admin\AdminCategoriaController;
use App\Http\Controllers\Admin\ProductoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect("/admin/categoria");
});

Route::get('/servicios', function(){
    return view("mis-servicios");
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource("/admin/categoria", AdminCategoriaController::class)->middleware("auth");
Route::resource("/admin/producto", ProductoController::class)->middleware("auth");