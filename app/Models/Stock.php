<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
    use HasFactory;

    public function Product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function Category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function SubCategory()
    {
        return $this->belongsTo(SubCategory::class,'sub_category_id','id');
    }
}
