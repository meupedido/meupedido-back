<?php

namespace App\Repositories;

use App\Interfaces\OrderRepositoryInterface;
use App\Models\Order;

class OrderRepository implements OrderRepositoryInterface
{
    private $model;

    public function __construct(Order $model)
    {
        $this->model = $model;
    }
}