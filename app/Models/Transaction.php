<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = "order_transactions";

    public function Order()
    {
        return $this->belongsTo(Order::class);
    }

    public function PaymentMode()
    {
        return $this->belongsTo(Payment::class,'payment_mode_id','id');
    }
}
