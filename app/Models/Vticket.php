<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vticket extends Model
{
    use HasFactory;

    public function User()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function Vendor()
    {
        return $this->belongsTo(Vendor::class,'vendor_id','id');
    }
}
