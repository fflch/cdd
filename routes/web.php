<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TermoController;
use App\Http\Controllers\RemissivaController;
use App\Http\Controllers\CddController;
use App\Http\Controllers\IndexController;

/*Route::get('/', [TermoController::class,'index']);
Route::get('/create', [TermoController::class,'create']);
Route::get('/{termo}', [termoController::class,'show']); */ 
Route::resource('/termos', TermoController::class);

Route::resource('/remissivas', RemissivaController::class);

Route::resource('/cdd', CddController::class);

Route::get('/', [IndexController::class,'index']);

Route::post('/termos/addcdd/{termo}', [TermoController::class,'addCdd']);

Route::delete('/termos/removecdd/{termo}/{cdd}', [TermoController::class,'removeUser']);