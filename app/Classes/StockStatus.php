<?php

namespace App\Classes;

use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;

class StockStatus
{
    public static function getStockStatus($product_id, $required_quantity)
    {
        $destroyed_quantity = 0;
        $added_quantity = 0;
        $quantity = 0;
        $destroyed_quantity = $destroyed_quantity + DB::table('stocks')->where('product_id', $product_id)->where('entry_type', 'destroy')->sum('quantity');
        $added_quantity = $added_quantity + DB::table('stocks')->where('product_id', $product_id)->where('entry_type', 'add')->sum('quantity');
        $quantity = $added_quantity - $destroyed_quantity;
        if ($required_quantity < $quantity) {
            return true;
        } else {
            return false;
        }
    }

    public static function getStockReport($product_id)
    {
        $destroyed_quantity = 0;
        $added_quantity = 0;
        $quantity = 0;
        $destroyed_quantity = $destroyed_quantity + DB::table('stocks')->where('product_id', $product_id)->where('entry_type', 'destroy')->sum('quantity');
        $added_quantity = $added_quantity + DB::table('stocks')->where('product_id', $product_id)->where('entry_type', 'add')->sum('quantity');
        $quantity = $added_quantity - $destroyed_quantity;
        if($quantity > 0)
        {
            return [
                'status' => 'In-Stock',
                'quantity' => $quantity
            ];
        }
        else{
            return [
                'status'=>'Out-Of-Stock',
                'quantity' => 0
            ];
        }
    }

    public static function getCartProductStatus()
    {
        if (auth()->user()) {
            Cart::instance('cart')->restore(auth()->user()->email);
            Cart::instance('wishlist')->restore(auth()->user()->email);
            Cart::instance('compare')->restore(auth()->user()->email);
        }
        $status = [];
        foreach (Cart::instance('cart')->content() as $item) {
            array_push($status,StockStatus::getStockStatus($item->id, $item->qty));
        }
        return $status;
    }
}
