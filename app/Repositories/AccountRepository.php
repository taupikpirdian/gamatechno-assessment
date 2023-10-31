<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Interfaces\AccountRepositoryInterface;

class AccountRepository implements AccountRepositoryInterface
{
    protected $model;
    protected $modelUser;

    public function __construct(Customer $model, User $modelUser)
    {
        $this->model = $model;
        $this->modelUser = $modelUser;
    }

    public function findCustomerByUserId($userId)
    {
        return $this->model::where('user_id', $userId)->first();
    }

    public function updateDataCustomer($payload)
    {
        $customer = $this->findCustomerByUserId(Auth::user()->id);
        if($customer){
            $customer->name = $payload['name'];
            $customer->place_of_birth = $payload['place_of_birth'];
            $customer->date_of_birth = $payload['date_of_birth'];
            $customer->address = $payload['address'];
            $customer->phone = $payload['phone'];
            $customer->update();
            
            return ['is_updated' => true];
        }

        return ['is_updated' => false];
    }

    public function createUser($payload)
    {
        return $this->modelUser::create([
            'name' => $payload['name'],
            'email' => $payload['email'],
            'password' => Hash::make($payload['password']),
        ]);
    }

    public function createCustomer($payload)
    {
        return $this->model::create([
            'user_id' => $payload['user_id'],
            'name' => $payload['name'],
            'place_of_birth' => isset($payload['place_of_birth']) ? $payload['place_of_birth'] : null,
            'date_of_birth' => isset($payload['date_of_birth']) ? $payload['date_of_birth'] : null,
            'address' => isset($payload['address']) ? $payload['address'] : null,
            'phone' => isset($payload['phone']) ? $payload['phone'] : null
        ]);
    }

    public function updateCustomer($payload)
    {
        return $this->model::updateOrCreate(
            [
                'user_id' => $payload['user_id'],
            ],
            [
                'name' => $payload['name'],
                'place_of_birth' => isset($payload['place_of_birth']) ? $payload['place_of_birth'] : null,
                'date_of_birth' => isset($payload['date_of_birth']) ? $payload['date_of_birth'] : null,
                'address' => isset($payload['address']) ? $payload['address'] : null,
                'phone' => isset($payload['phone']) ? $payload['phone'] : null
            ]
        );
    }
}
