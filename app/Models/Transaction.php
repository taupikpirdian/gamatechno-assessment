<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'user_id',
        'product_id',
        'no_transaction',
        'date',
        'total_amount',
        'discount',
        'total_payment',
        'cashback',
    ];
}
