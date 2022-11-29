<?php

namespace App\Interfaces;

interface CategoryProductRepositoryInterface
{
    public function getAll();
    public function getById(int $id);
}