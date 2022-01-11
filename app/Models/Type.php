<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Type extends Model
{
    use HasFactory;
    use SoftDeletes;


    public function SubType()
    {
        return $this->hasMany(SubType::class);
    }

    public function Category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function SubCategory()
    {
        return $this->belongsTo(SubCategory::class,'sub_category_id','id');
    }

    public function Product()
    {
        return $this->hasMany(Product::class);
    }
}
