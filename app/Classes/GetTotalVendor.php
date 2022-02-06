<?php

namespace App\Classes;

use App\Models\Order;
use App\Models\Vcommision;
use App\Models\Vendor;

class GetTotalVendor
{
    public static function getTotal($vendor_id)
    {
        $total = 0;
        try {
            $orders = Order::where('status', 'delivered')->get();
            foreach ($orders as $order) {
                foreach ($order->OrderItem as $item) {
                    if($item->Product->Vendor)
                    {
                        if($item->Product->Vendor->id == $vendor_id){
                            $total = $total + $order->total;
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return $total;
    }

    public static function getCommision($vendor_id,$total)
    {
        $percent = 0;
        $amount = 0;
        try {
            $commision = Vcommision::where('vendor_id',$vendor_id)->firstOrFail();
            $percent = $percent + $commision->commision;

            $amount =  str_replace('.','',(($percent / 100 ) * $total));
            
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return [
            'percent' => $percent,
            'amount' => $amount
        ];
    }
}
