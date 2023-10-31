<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductController extends Controller
{
    private $productRepository;
  
    public function __construct(ProductRepositoryInterface $productRepository) {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        return $this->success($this->productRepository->listData(), "Success", 200);
    }
}
