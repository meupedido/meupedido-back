<?php

namespace App\Interfaces;

interface ProductRepositoryInterface
{
    public function getProducts(int $company_id);
    public function getProductById(int $id);
    public function getProductsByCategory(int $company_id);
    public function createProduct(int $company_id, array $body, string $file_name);
    public function updateProduct(int $id, array $body);
    public function delete(int $id);
}
