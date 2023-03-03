<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductRepositoryInterface
{
    private $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function getProducts(int $company_id)
    {
        return $this->model->where('company_id', $company_id)
        ->with('category')
        ->orderby('on_sale', 'desc')
        ->get();
    }

    public function getProductById(int $id)
    {
        $product = $this->model->where('id', $id)->with('category')->first();

        $file_path = public_path('storage/images_products/' . $product->path_img);
        $image = "data:image/png;base64,".base64_encode(file_get_contents($file_path));

        $product->base64 = $image;

        return $product;
    }

    public function getProductsByCategory(int $company_id)
    {
        $products = DB::table('products')
        ->join('companies', 'products.company_id', '=', 'companies.id')
        ->select('products.*')
        ->where('companies.id', $company_id)
        ->get();

        foreach($products as $product){
            $file_path = public_path('storage/images_products/' . $product->path_img);
            $base64 = "data:image/png;base64,".base64_encode(file_get_contents($file_path));

            $product->imgBase64 = $base64;
        }

        return $products;
    }

    public function createProduct(int $company_id, $body, string $file_name)
    {
        $product = $this->model->create([
            'name' => $body['name'],
            'description' => $body['description'],
            'observation' => $body['observation'],
            'path_img' => $file_name,
            'price' => $body['price'],
            'on_sale' => $body['on_sale'],
            'is_avaliable' => $body['is_avaliable'],
            'company_id' => $company_id,
            'category_id' => $body['category_id'],
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
            'on_sale' => $body['on_sale'],
            'is_avaliable' => $body['is_avaliable'],
        ]);

    }

    public function delete(int $id)
    {
        $product = $this->model->find($id);

        return $product->delete();
    }
}
