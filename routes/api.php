<?php

use App\Http\Controllers\LineOfBusinessController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->group(base_path('routes/api-auth.php'));
Route::prefix('companies')->group(base_path('routes/api-company.php'));
Route::prefix('products')->group(base_path('routes/api-product.php'));
Route::prefix('categories-products')->group(base_path('routes/api-category-product.php'));
Route::prefix('orders')->group(base_path('routes/api-order.php'));
Route::prefix('fields')->group( function () {
    Route::get('', [LineOfBusinessController::class, 'getAll']);
    Route::get('/{id}', [LineOfBusinessController::class, 'getById']);
});
