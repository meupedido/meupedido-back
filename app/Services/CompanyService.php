<?php

namespace App\Services;

use App\Repositories\CompanyRepository;

class CompanyService {
    private $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;    
    }

    public function getAllCompany(){
        return $this->companyRepository->getAllCompanies();
    }

    public function getCompanyById($id){
        return $this->companyRepository->getCompanyById($id);
    }

    public function getCategories($id)
    {
        return $this->companyRepository->getCategories($id);
    }
}