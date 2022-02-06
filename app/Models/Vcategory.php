<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vcategory extends Model
{
    use HasFactory;

    public function Type()
    {
        return $this->hasMany(Vtype::class);
    }

    public function Vendor()
    {
        return $this->hasMany(Vendor::class);
    }
}
