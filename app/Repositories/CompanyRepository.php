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
        ->with(['products' => function ($query) {
            $query->orderby('on_sale', 'desc');
        }])
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

    public function createCompany(array $body)
    {
        return $this->model->create($body);
    }

    public function updateCompany($id, $body)
    {
        $company = $this->model->find($id);

        return $company->update([
            'name' => $body['name'],
            'email' => $body['email'],
            'phone' => $body['phone'],
            'whatsapp' => $body['whatsapp'],
            'payment_methods' => $body['payment_methods'],
            'minimum_order' => $body['minimum_order'],
            'delivery_fee' => $body['delivery_fee'],
            'status' => $body['status'],
            'opening_hours' => $body['opening_hours'],
            'closing_hours' => $body['closing_hours'],
            'branch_id' => $body['branch_id'],
        ]);
    }
}