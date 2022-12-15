<?php

namespace App\Services;

use App\Repositories\CategoryProductRepository;

class CategoryProductService
{
    private $repository;

    public function __construct(CategoryProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function getById($id)
    {
        return $this->repository->getById($id);
    }

    public function getProductsByBranch($branch_id)
    {
        return $this->repository->getProductsByBranch($branch_id);
    }
}