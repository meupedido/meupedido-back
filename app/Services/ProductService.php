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
}