<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";

    public function User()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function OrderItem()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function Transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}
