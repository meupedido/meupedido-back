<?php

namespace App\Http\Controllers;

use App\Services\CategoryProductService;
use Database\Seeders\CategoryProductSeeder;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{

    private $categoryProductService;

    public function __construct(CategoryProductService $service)
    {
        $this->categoryProductService = $service;
    }

    public function getAll()
    {
        return $this->categoryProductService->getAll();
    }

    public function getById($id)
    {
        return $this->categoryProductService->getById($id);
    }
}
