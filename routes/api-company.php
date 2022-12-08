<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;

Route::get('', [CompanyController::class, 'getAllCompanies']);
Route::get('/{id}', [CompanyController::class, 'getCompanyById']);
Route::get('/categories/{id}', [CompanyController::class, 'getCategories']);
Route::post('', [CompanyController::class, 'createCompany']);
Route::put('{id}', [CompanyController::class, 'updateCompany']);