<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordController;

/*Route::get('/', [RecordController::class,'index']);
Route::get('/create', [RecordController::class,'create']);
Route::get('/{record}', [RecordController::class,'show']); */ 
Route::resource('records', RecordController::class);
