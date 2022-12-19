<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('{id}', [OrderController::class, 'getOrdersById']);
Route::get('/by-company/{id}', [OrderController::class, 'getOrdersByCompany']);
Route::post('', [OrderController::class, 'createOrder']);