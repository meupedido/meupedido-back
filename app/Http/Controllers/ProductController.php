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

    public function getProductById($id)
    {
        return $this->productService->getProductById($id);
    }

    public function create($company_id, Request $request)
    {
        return $this->productService->createProduct($company_id, $request);
    }
}
