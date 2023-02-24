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

    public function getOrdersByCompany($company_id, $request)
    {
        $result = $this->model->where(function($query) use($company_id, $request) {
            $query->where('company_id', $company_id);
            if($request->start_date && $request->finish_date){
                $query->whereDate('created_at', '>=', date($request->start_date))
                ->whereDate('created_at', '<=', date($request->finish_date));
            }
        })
        ->get();

        return $result;
    }

    public function createOrder($body)
    {
        return $this->model->create([
            "order_tag" => $body->order_tag,
            "demanded" => $body->demanded,
            "quantity" => $body->quantity,
            "payment" => $body->payment,
            "value" => $body->value,
            "address" => $body->address,
            "comments" => $body->comments,
            "client_name" => $body->client_name,
            "client_phone" => $body->client_phone,
            "delivery_method" => $body->delivery_method,
            "company_id" => $body->company_id,
        ]);
    }
    public function updateOrder($order_id, $body)
    {
        return $this->model->find($order_id)
        ->update([
            "order_tag" => $body->order_tag,
            "demanded" => $body->demanded,
            "quantity" => $body->quantity,
            "payment" => $body->payment,
            "value" => $body->value,
            "address" => $body->address,
            "comments" => $body->comments,
            "client_name" => $body->client_name,
            "client_phone" => $body->client_phone,
            "delivery_method" => $body->delivery_method,
        ]);
    }
}
