<?php 

namespace App\Classes;

use App\Models\Order;

class GetOrder
{
    public static function get($order_id)
    {
        $order = Order::where('id',$order_id)->with('User','OrderItem')->first();
        return $order;
    }
}