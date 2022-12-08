<?php

namespace App\Interfaces;

interface CompanyAddressRepositoryInterface
{
    public function createAddress($body, $company_id);
    public function updateAddress($address_id, $body);
}