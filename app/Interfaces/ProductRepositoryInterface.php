<?php

namespace App\Interfaces;

interface ProductRepositoryInterface
{
    public function getProducts(int $company_id);
    public function getProductById(int $id);
    public function createProduct(int $company_id, array $body);
    public function updateProduct(int $id, array $body);
    public function delete(int $id);
}