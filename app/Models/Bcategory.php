<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bcategory extends Model
{
    use HasFactory;

    public function Blog()
    {
        return $this->hasMany(Blog::class);
    }
}
