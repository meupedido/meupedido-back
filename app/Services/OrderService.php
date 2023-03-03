<?php

namespace App\Services;

use App\Repositories\OrderRepository;
use Illuminate\Http\Response;
use Ramsey\Uuid\Uuid;

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

    public function getOrdersByCompany($company_id, $request)
    {
        $orders = $this->order_repository->getOrdersByCompany($company_id, $request);

        return $orders;
    }

    public function createOrder($body)
    {
        if ($body->hasFile('image')) {
            $file = $body->file('image');
            $extension = $file->extension();
            $file_name = Uuid::uuid4() . '.' . $extension;

            $body->image->storeAs('public/images_orders', $file_name);
        };

        $order = $this->order_repository->createOrder($body, $file_name);

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

    public function getBase64Img($order){
        $file_path = public_path('storage/images_orders/' . $order->file_name);
        $base64 = "data:image/png;base64,".base64_encode(file_get_contents($file_path));

        return $base64;
    }
}
