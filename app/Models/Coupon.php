<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    public function Admin()
    {
        return $this->belongsTo(Admin::class,'admin_id','id');
    }
}
