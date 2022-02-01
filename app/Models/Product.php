<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function scopeStatus($query)
    {
        return $query->where('status', true);
    }
    public function scopeTDeal($query)
    {
        return $query->where('t_deal', true);
    }
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }
    public function scopeMostViewed($query)
    {
        return $query->orderBy('views', 'DESC');
    }

    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function SubCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id');
    }

    public function Type()
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }

    public function SubType()
    {
        return $this->belongsTo(SubType::class, 'sub_type_id', 'id');
    }

    public function Vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id', 'id');
    }

    public function Admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function Brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }


    public function OrderItem()
    {
        return $this->hasMany(OrderItem::class, 'product_id');
    }

    public function AttributeValue()
    {
        return $this->hasMany(AttributeValue::class, 'product_id');
    }

    public function Stock()
    {
        return $this->hasMany(Stock::class);
    }
}
