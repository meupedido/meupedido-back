<?php

namespace App\Repositories;

use App\Interfaces\CompanyRepositoryInterface;
use App\Models\Company;

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

}