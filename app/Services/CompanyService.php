<?php

namespace App\Services;

use App\Repositories\CompanyAddressRepository;
use App\Repositories\CompanyRepository;
use Illuminate\Http\Response;

class CompanyService {
    private $companyRepository;
    private $company_address_repository;

    public function __construct(CompanyRepository $companyRepository, CompanyAddressRepository $company_address_repository)
    {
        $this->companyRepository = $companyRepository;
        $this->company_address_repository = $company_address_repository;
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

    public function createCompany($body)
    {
        $company = $this->companyRepository->createCompany($body);

        $this->company_address_repository->createAddress($body, $company->id);

        return response()->json(
            [
                'message' => 'success',
                'status_code' => Response::HTTP_CREATED,
            ],
            Response::HTTP_CREATED
        );
    }

    public function updateCompany($id, $body)
    {
        $this->companyRepository->updateCompany($id, $body);

        return response()->json(
            [
                'message' => 'success',
                'status_code' => Response::HTTP_OK,
            ],
            Response::HTTP_OK
        );
    }
    public function updateAddress($address_id, $body)
    {
        $this->company_address_repository->updateAddress($address_id, $body);

        return response()->json(
            [
                'message' => 'success',
                'status_code' => Response::HTTP_OK,
            ],
            Response::HTTP_OK
        );
    }

    public function alterStatus($company_id, $status){
        $this->companyRepository->alterStatus($company_id, $status);

        return response()->json(
            [
                'message' => 'success',
                'status_code' => Response::HTTP_OK,
            ],
            Response::HTTP_OK
        );
    }
}
