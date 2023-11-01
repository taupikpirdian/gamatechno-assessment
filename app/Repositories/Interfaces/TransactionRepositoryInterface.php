<?php

namespace App\Repositories\Interfaces;

interface TransactionRepositoryInterface
{
    public function listData();
    public function store($dto);
}
