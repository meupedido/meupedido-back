<?php

namespace App\Services;

use App\Repositories\OrderRepository;

class OrderService
{
    private $order_repository;

    public function __construct(OrderRepository $order_repository)
    {
        $this->order_repository = $order_repository;
    }
}