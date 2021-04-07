<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\RemissivaController;
use App\Http\Controllers\CddController;
use App\Http\Controllers\IndexController;

/*Route::get('/', [RecordController::class,'index']);
Route::get('/create', [RecordController::class,'create']);
Route::get('/{record}', [RecordController::class,'show']); */ 
Route::resource('/records', RecordController::class);

Route::resource('/remissivas', RemissivaController::class);

Route::resource('/cdd', CddController::class);

Route::get('/', [IndexController::class,'index']);

Route::post('/records/addcdd/{record}', [RecordController::class,'addCdd']);

Route::delete('/records/removecdd/{record}/{cdd}', [RecordController::class,'removeUser']);