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
    
}
