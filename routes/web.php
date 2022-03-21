<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', [MainController::class,'home']);

Route::get('/table/{table}', [MainController::class,'table']);

Route::get('/table/{table}/detail/{keyid}', [MainController::class,'detail']);