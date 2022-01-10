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


    public function SubCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class)->where('status', 1)->where('is_sold', 0);
    }

    protected static function boot() {
        parent::boot();

        static::creating(function ($question) {
            $question->slug = Str::slug($question->name);
        });
    }

}
