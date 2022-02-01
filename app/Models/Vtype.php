<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vtype extends Model
{
    use HasFactory;

    public function Vcategory()
    {
        return $this->belongsTo(Vcategory::class,'vcategory_id','id');
    }
}
