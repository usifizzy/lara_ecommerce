<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;


    protected $table            = 'orders';
    protected $primaryKey       = 'id';
    public $incrementing = true;

    protected $fillable    = ['order_no', 'amount', 'status', 'customer_id'];


    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // public function customer(): HasOne
    // {
    //     return $this->hasOne(User::class);
    // }
}
