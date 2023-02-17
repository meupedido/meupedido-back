<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $order_service;

    public function __construct(OrderService $order_service)
    {
        $this->order_service = $order_service;
    }

    public function getOrdersById($id)
    {
        return $this->order_service->getOrderById($id);
    }

    public function getOrdersByCompany($company_id, Request $request)
    {
        return $this->order_service->getOrdersByCompany($company_id, $request);
    }

    public function createOrder(Request $request)
    {
        return $this->order_service->createOrder($request);
    }

    public function updateOrder($id, Request $request)
    {
        return $this->order_service->updateOrder($id, $request);
    }

}
