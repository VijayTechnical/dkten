<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = "order_items";

    public function Order()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }

    public function Product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function Review()
    {
        return $this->hasOne(Review::class,'order_item_id');
    }
}
