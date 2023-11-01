<?php

namespace App\Repositories\Interfaces;

interface AccountRepositoryInterface
{
    public function updateDataCustomer($payload);
    public function findCustomerByUserId($userId);
    public function createUser($payload);
    public function createCustomer($payload);
    public function updateCustomer($payload);
    public function listCustomer();
}
