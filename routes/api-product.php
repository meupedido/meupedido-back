<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/all/{company_id}', [ProductController::class, 'getProducts']);
Route::get('/{id}', [ProductController::class, 'getProductById']);
Route::post('/{company_id}', [ProductController::class, 'create']);
Route::put('/{id}', [ProductController::class, 'update']);
Route::delete('/{id}', [ProductController::class, 'delete']);