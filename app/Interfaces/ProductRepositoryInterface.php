<?php

namespace App\Interfaces;

interface ProductRepositoryInterface
{
    public function getProductById(int $id);
    public function createProduct(int $company_id, array $body);
    public function updateProduct(int $id, array $body);
}