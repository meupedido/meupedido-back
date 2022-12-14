<?php

namespace App\Repositories;

use App\Interfaces\CategoryProductRepositoryInterface;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\DB;

class CategoryProductRepository implements CategoryProductRepositoryInterface
{

    private $model;

    public function __construct(CategoryProduct $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById(int $id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function getProductsByBranch(int $branch_id)
    {
        return DB::table('categories_products')
        ->where('categories_products.branch_id', $branch_id)
        ->get();
    }
}