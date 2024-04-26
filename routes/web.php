<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TermoController;
use App\Http\Controllers\RemissivaController;
use App\Http\Controllers\CddController;
use App\Http\Controllers\LoginController;

Route::get('/', [TermoController::class,'index']);

Route::resource('/termos', TermoController::class);
Route::get('/termo/search', [TermoController::class, 'search'])->name('termo.search');

Route::resource('/remissivas', RemissivaController::class);

Route::resource('/cdd', CddController::class);
Route::get('/termo/pesquisacdd', [TermoController::class, 'pesquisacdd'])->name('termo.pesquisacdd');
Route::get('/termo/searchcdd', [TermoController::class, 'searchcdd'])->name('termo.searchcdd');
Route::get('/termo/pesquisabooleana', [TermoController::class, 'pesquisabooleana'])->name('termo.pesquisabooleana');
Route::get('/termo/searchbooleana', [TermoController::class, 'searchbooleana'])->name('termo.searchbooleana');


Route::post('/termos/addcdd/{termo}', [TermoController::class,'addCdd']);
Route::delete('/termos/removecdd/{termo}/{cdd}', [TermoController::class,'removeCdd']);

# Logs
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->middleware('can:admins');
