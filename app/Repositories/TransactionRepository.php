<?php

namespace App\Repositories;

use App\Models\Transaction;
use App\Repositories\Interfaces\TransactionRepositoryInterface;

class TransactionRepository implements TransactionRepositoryInterface
{
    protected $model;

    public function __construct(Transaction $model)
    {
        $this->model = $model;
    }

    public function listData()
    {
        return $this->model::orderBy('created_at', 'desc')->paginate(25);
    }

    public function store($payload)
    {
        return $this->model::create($payload);
    }

    public function detail($id)
    {
        return $this->model::where('id', $id)->first();
    }
}
