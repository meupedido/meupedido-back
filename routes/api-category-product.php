<?php

use App\Http\Controllers\CategoryProductController;
use Illuminate\Support\Facades\Route;

Route::get('/all', [CategoryProductController::class, 'getAll']);
Route::get('/{id}', [CategoryProductController::class, 'getById']);
Route::get('by_branch/{branch_id}', [CategoryProductController::class, 'getProductsByBranch']);