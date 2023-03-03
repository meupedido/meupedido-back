<?php

namespace App\Repositories;

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
        $order = $this->model->find($id);

        $file_path = public_path('storage/images_orders/' . $order->file_name);
        $image = "data:image/png;base64,".base64_encode(file_get_contents($file_path));

        $order->base64 = $image;

        return $order;
    }

    public function getOrdersByCompany($company_id, $request)
    {
        $orders = $this->model->where(function($query) use($company_id, $request) {
            $query->where('company_id', $company_id);
            if($request->start_date && $request->finish_date){
                $query->whereDate('created_at', '>=', date($request->start_date))
                ->whereDate('created_at', '<=', date($request->finish_date));
            }
        })
        ->get();

        foreach($orders as $order){
            $file_path = public_path('storage/images_orders/' . $order->file_name);
            $base64 = "data:image/png;base64,".base64_encode(file_get_contents($file_path));

            $order->imgBase64 = $base64;
        }

        return $orders;
    }

    public function createOrder($body, string $file_name = null)
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
            "file_name" => $file_name,
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
