<?php

namespace App\Classes;

use Illuminate\Support\Facades\DB;

class TotalPurchase{
    public static function getTotalPurchase($customer_id)
    {
        $orders = DB::table('orders')->where('user_id',$customer_id)->get();
        if($orders)
        {
            $total_purchase = $orders->sum('total');
            return $total_purchase;
        }
        else{
            $total_purchase = 0;
            return $total_purchase;
        }
    }
}