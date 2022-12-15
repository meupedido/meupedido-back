<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('', [AuthController::class, 'getUser'])->middleware('auth:api');
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth:api');
Route::post('', [AuthController::class, 'login']);