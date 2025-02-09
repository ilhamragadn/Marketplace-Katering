<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_quantity',
        'total_price',
        'delivery_date'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'prod_id');
    }
}
