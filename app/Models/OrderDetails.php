<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    protected $fillable    = ['order_id', 'product_name', 'price', 'quantity', 'amount', 'product_id'];
}
