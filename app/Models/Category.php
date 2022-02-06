<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name','slug','image','status'];

    public function scopeStatus($query)
    {
        return $query->where('status', true);
    }


    public function SubCategory()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function Type()
    {
        return $this->hasMany(Type::class);
    }

    public function Product()
    {
        return $this->hasMany(Product::class)->where('status', 1)->where('is_sold', 0);
    }


}
