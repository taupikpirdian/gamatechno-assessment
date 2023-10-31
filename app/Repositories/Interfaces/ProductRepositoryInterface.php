<?php

namespace App\Repositories\Interfaces;

interface ProductRepositoryInterface
{
    public function listData();
    public function findById($id);
}
