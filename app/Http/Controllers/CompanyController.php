<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CompanyService;

class CompanyController extends Controller
{

    protected $companyService;

    public function __construct(CompanyService $companyService){
        $this->companyService = $companyService;
    }

    public function getAllCompanies()
    {
        return $this->companyService->getAllCompany();
    }

    public function getCompanyById($id){
        return $this->companyService->getCompanyById($id);
    }

    public function getCategories($id)
    {
        return $this->companyService->getCategories($id);
    }
}
