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

    public function Region()
    {
        return $this->belongsTo(Region::class,'region_id','id');
    }

    public function City()
    {
        return $this->belongsTo(City::class,'city_id','id');
    }

    public function Area()
    {
        return $this->belongsTo(Area::class,'area_id','id');
    }
}
