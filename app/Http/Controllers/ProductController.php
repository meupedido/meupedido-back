<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function getProducts($company_id)
    {
        return $this->productService->getProducts($company_id);
    }

    public function getProductById($id)
    {
        return $this->productService->getProductById($id);
    }

    public function create($company_id, Request $request)
    {
        return $this->productService->createProduct($company_id, $request);
    }

    public function update($id, Request $request)
    {
        return $this->productService->updateProduct($id, $request);
    }
}
