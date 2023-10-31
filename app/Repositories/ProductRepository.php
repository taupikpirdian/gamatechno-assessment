<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function listData()
    {
        return $this->model::orderBy('name', 'asc')->paginate(25);
    }
  
}
