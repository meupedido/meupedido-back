<?php

namespace App\Services;

use App\Repositories\OrderRepository;
use Illuminate\Http\Response;

class OrderService
{
    private $order_repository;

    public function __construct(OrderRepository $order_repository)
    {
        $this->order_repository = $order_repository;
    }

    public function getOrderById($id)
    {
        $order = $this->order_repository->getOrderById($id);

        if (!$order){
            return response()->json(
                "Pedido não encontrado!",
                Response::HTTP_NOT_FOUND
        );
        }

        return response()->json($order);
    }

    public function getOrdersByCompany($company_id)
    {
        $orders = $this->order_repository->getOrdersByCompany($company_id);

        return $orders;
    }

    public function createOrder($body)
    {
        $order = $this->order_repository->createOrder($body);

        return response()->json(
            [
                'message' => 'success',
                "data" => $order,
                'status_code' => Response::HTTP_OK,
            ],
            Response::HTTP_OK
        );
    }

    public function updateOrder($order_id, $body)
    {
        $this->order_repository->updateOrder($order_id, $body);

        return response()->json(
            [
                'message' => 'success',
                'status_code' => Response::HTTP_OK,
            ],
            Response::HTTP_OK
        );
    }
}