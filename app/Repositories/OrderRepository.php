<?php

namespace App\Repositories;

use App\Interfaces\OrderRepositoryInterface;
use App\Models\Order;

class OrderRepository
{
    private $model;

    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    public function getOrderById($id)
    {
        return $this->model->find($id);
    }

    public function getOrdersByCompany($company_id)
    {
        return $this->model->where('company_id', $company_id)
        ->get();
    }

    public function createOrder($body)
    {
        return $this->model->create([
            "demanded" => $body->demanded,
            "quantity" => $body->amount,
            "payment" => $body->payment,
            "value" => $body->value,
            "address" => $body->address,
            "comments" => $body->comments,
            "company_id" => $body->company_id,
        ]);
    }
    public function updateOrder($order_id, $body)
    {
        return $this->model->find($order_id)
        ->update([
            "demanded" => $body->demanded,
            "quantity" => $body->amount,
            "payment" => $body->payment,
            "value" => $body->value,
            "address" => $body->address,
            "comments" => $body->comments,
        ]);
    }
}