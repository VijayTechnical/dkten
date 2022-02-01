<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Vendor extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $guard_name = 'vendor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function Product()
    {
        return $this->hasMany(Product::class);
    }

    public function Type()
    {
        return $this->belongsTo(Vcategory::class,'vcategory_id','id');
    }

    public function Mall()
    {
        return $this->belongsTo(Mall::class,'mall_id','id');
    }
    public function Eservice()
    {
        return $this->belongsTo(Eservice::class,'eservice_id','id');
    }
    public function Gvendor()
    {
        return $this->belongsTo(Gvendor::class,'gvendor_id','id');
    }
}
