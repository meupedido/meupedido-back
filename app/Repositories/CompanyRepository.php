<?php

namespace App\Repositories;

use App\Interfaces\CompanyRepositoryInterface;
use App\Models\Company;
use Illuminate\Support\Facades\DB;

class CompanyRepository implements CompanyRepositoryInterface{
    
    private $model;

    public function __construct(Company $company)
    {
        $this->model = $company;
    }

    public function getAllCompanies()
    {
        return $this->model->all();
    }

    public function getCompanyById(int $id)
    {
        return $this->model->where('id', $id)
        ->with('address')
        ->with('products')
        ->first();
    }

    public function getCategories($id)
    {
        return DB::table('companies')
        ->join('products', 'products.company_id', '=', 'companies.id')
        ->join('categories_products', 'products.category_id', '=', 'categories_products.id')
        ->select('categories_products.id', 'categories_products.description')
        ->distinct()
        ->where('companies.id', $id)
        ->get();
    }
}