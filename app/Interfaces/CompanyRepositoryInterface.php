<?php

namespace App\Interfaces;

interface CompanyRepositoryInterface
{
    public function getAllCompanies();
    public function getCompanyById(int $id);
}