<?php

namespace App\Repositories;

use App\Interfaces\CompanyAddressRepositoryInterface;
use App\Models\CompanyAddress;

class CompanyAddressRepository implements CompanyAddressRepositoryInterface
{
    private $model;

    public function __construct(CompanyAddress $model)
    {
        $this->model = $model;
    }

    public function createAddress($body, $company_id)
    {
        return $this->model->create([
            'street' => $body['street'],
            'number' => $body['number'],
            'district' => $body['district'],
            'city' => $body['city'],
            'state' => $body['state'],
            'cep' => $body['cep'],
            'company_id' => $company_id,
        ]);
    }

    public function updateAddress($address_id, $body)
    {
        $address = $this->model->find($address_id);

        return $address->update([
            "street" => $body['street'],
            "number" => $body['number'],
            "district" => $body['district'],
            "city" => $body['city'],
            "state" => $body['state'],
            "cep" => $body['cep'],
            "point_of_reference" => $body['point_of_reference'],
        ]);
    }

}
