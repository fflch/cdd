<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TermoController;
use App\Http\Controllers\RemissivaController;
use App\Http\Controllers\CddController;
use App\Http\Controllers\LoginController;

Route::get('/', [TermoController::class,'index']);
Route::resource('/termos', TermoController::class);

Route::resource('/remissivas', RemissivaController::class);

Route::resource('/cdd', CddController::class);

Route::post('/termos/addcdd/{termo}', [TermoController::class,'addCdd']);
Route::delete('/termos/removecdd/{termo}/{cdd}', [TermoController::class,'removeCdd']);

# Logs  
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->middleware('can:admins');
