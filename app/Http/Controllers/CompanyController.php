<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\UpdateAddressCompanyRequest;
use App\Http\Requests\Company\UpdateCompanyRequest;
use App\Http\Requests\StoreCompanyRequest;
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

    public function createCompany(StoreCompanyRequest $request)
    {
        $validate = $request->validated();

        return $this->companyService->createCompany($validate);
    }

    public function updateCompany($company_id, UpdateCompanyRequest $request)
    {
        return $this->companyService->updateCompany($company_id, $request);
    }

    public function updateAddress($address_id, UpdateAddressCompanyRequest $request)
    {
        return $this->companyService->updateAddress($address_id, $request);
    }

}
