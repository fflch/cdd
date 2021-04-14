<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TermoController;
use App\Http\Controllers\RemissivaController;
use App\Http\Controllers\CddController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;

Route::resource('/termos', TermoController::class);

Route::resource('/remissivas', RemissivaController::class);

Route::resource('/cdd', CddController::class);

Route::get('/', [IndexController::class,'index']);

Route::post('/termos/addcdd/{termo}', [TermoController::class,'addCdd']);
Route::delete('/termos/removecdd/{termo}/{cdd}', [TermoController::class,'removeCdd']);

/* Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout']); */

Route::get('login', [LoginController::class, 'redirectToProvider']);
Route::get('callback', [LoginController::class, 'handleProviderCallback']);
Route::post('logout', [LoginController::class, 'logout']);

