<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name','slug','image','status','category_id'];

    public function Category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    protected static function boot() {
        parent::boot();

        static::creating(function ($question) {
            $question->slug = Str::slug($question->name);
        });
    }
}
