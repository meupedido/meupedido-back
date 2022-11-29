<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    private $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function getProductById(int $id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function createProduct(int $company_id, $body)
    {
        $product = $this->model->create([
            'name' => $body['name'],
            'description' => $body['description'],
            'observation' => $body['observation'],
            'path_img' => $body['path_img'],
            'price' => $body['price'],
            'company_id' => $company_id,
        ]);

        return $product;
    }

    public function updateProduct(int $id, $body)
    {
        $product = $this->model->findOrFail($id);

        return $product->update([
            'name' => $body['name'],
            'description' => $body['description'],
            'observation' => $body['observation'],
            'path_img' => $body['path_img'],
            'price' => $body['price'],
        ]);

    }
}