<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function Category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function SubCategory()
    {
        return $this->belongsTo(SubCategory::class,'sub_category_id','id');
    }

    public function Type()
    {
        return $this->belongsTo(Type::class,'type_id','id');
    }

    public function SubType()
    {
        return $this->belongsTo(SubType::class,'sub_type_id','id');
    }

    public function Vendor()
    {
        return $this->belongsTo(Vendor::class,'user_id','id');
    }

    public function Admin()
    {
        return $this->belongsTo(Admin::class,'user_id','id');
    }

    public function Brand()
    {
        return $this->belongsTo(Brand::class,'brand_id','id');
    }


    public function orderItems()
    {
        return $this->hasMany(OrderItem::class,'product_id');
    }

    public function AttributeValues()
    {
        return $this->hasMany(AttributeValue::class,'product_id');
    }
}
