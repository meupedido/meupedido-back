<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use Illuminate\Http\Response;

class ProductService
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
      $this->productRepository = $productRepository;  
    }

    public function getProducts($company_id)
    {
        return $this->productRepository->getProducts($company_id);
    }

    public function getProductById($product_id)
    {
        $product = $this->productRepository->getProductById($product_id);

        if(!$product){
            return response()->json(
                [
                    'message' => 'Produto não encontrado',
                    'status_code' => Response::HTTP_NOT_FOUND,
                ],
                Response::HTTP_NOT_FOUND
            );
        }

        return response()->json(
            [
                'data' => $product,
                'status_code' => Response::HTTP_OK,
            ],
            Response::HTTP_OK
        );
    }

    public function getProductsByCategory($company_id, $category_id)
    {
        $products = $this->productRepository->getProductsByCategory($company_id);

        $filter_products = array_filter(json_decode($products), function ($product) use ($category_id) {
            return $product->category_id == $category_id;
        });
        
        return $filter_products;
    }

    public function createProduct($company_id, $body){
        $result = $this->productRepository->createProduct($company_id, $body);

        return response()->json(
            [
                'data' => $result,
                'status_code' => Response::HTTP_CREATED,
            ],
            Response::HTTP_CREATED
        );
    }

    public function updateProduct($id, $body)
    {
        $product = $this->productRepository->getProductById($id, $body);

        if(!$product){
            return response()->json(
                [
                    'message' => 'Produto não encontrado',
                    'status_code' => Response::HTTP_NOT_FOUND,
                ],
                Response::HTTP_NOT_FOUND
            );
        }

        $this->productRepository->updateProduct($id, $body);

        return response()->json(
            [
                'message' => 'Produto atualizado com sucesso!',
                'status_code' => Response::HTTP_OK,
            ],
            Response::HTTP_OK
        );
    }

    public function deleteProduct($id)
    {
        $product = $this->productRepository->getProductById($id);

        if(!$product){
            return response()->json(
                [
                    'message' => 'Produto não encontrado',
                    'status_code' => Response::HTTP_NOT_FOUND,
                ],
                Response::HTTP_NOT_FOUND
            );
        }

        return $this->productRepository->delete($id);
    }
}