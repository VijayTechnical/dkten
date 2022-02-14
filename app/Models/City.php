<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function Region()
    {
        return $this->belongsTo(Region::class,'region_id','id');
    }
}
