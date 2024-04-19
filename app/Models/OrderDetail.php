<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderDetail extends Model
{
    use HasFactory;



    protected $table            = 'order_details';
    protected $primaryKey       = 'id';
    public $incrementing = true;
    protected $fillable    = ['order_id', 'product_name', 'price', 'quantity', 'amount'];




    public function order(): HasOne
    {
        return $this->hasOne(Order::class);
    }


    // public function product(): HasOne
    // {
    //     return $this->hasOne(Product::class);
    // }
}
