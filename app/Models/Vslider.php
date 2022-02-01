<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vslider extends Model
{
    use HasFactory;

    public function Vendor()
    {
        return $this->belongsTo(Vendor::class,'vendor_id','id');
    }
}
