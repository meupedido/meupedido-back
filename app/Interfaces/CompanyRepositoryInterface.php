<?php

namespace App\Interfaces;

interface CompanyRepositoryInterface
{
    public function getAllCompanies();
    public function getCompanyById(int $id);
    public function getCategories(int $id);
    public function createCompany(array $body);
    public function updateCompany($id, array $body);
}