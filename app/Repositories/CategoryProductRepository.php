<?php

namespace App\Repositories;

use App\Interfaces\CategoryProductRepositoryInterface;
use App\Models\CategoryProduct;

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
}