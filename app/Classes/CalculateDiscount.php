<?php

namespace App\Classes;

use Gloudemans\Shoppingcart\Facades\Cart;

class CalculateDiscount
{

    public static function getCartStatus()
    {
        if (!Cart::instance('cart')->count() > 0) {
            session()->forget('checkout');
            return false;
        }
        return true;
    }

    public static function calculateDiscounts()
    {
        try {
            if (session()->has('coupon')) {
                if (session()->get('coupon')['type'] == 'fixed') {
                    $discount = session()->get('coupon')['value'];
                } else {
                    $discount = (str_replace(',', '', Cart::instance('cart')->subtotal()) * session()->get('coupon')['value']) / 100;
                }
                $subtotalAfterDiscount = str_replace(',', '', Cart::instance('cart')->subtotal()) - $discount;
                $taxAfterDiscount = ($subtotalAfterDiscount * config('cart.tax')) / 100;
                $totalAfterDiscount = $subtotalAfterDiscount + $taxAfterDiscount + 100;
            } else {
                $discount = 0;
                $subtotalAfterDiscount = str_replace(',', '', Cart::instance('cart')->subtotal());
                $taxAfterDiscount = str_replace(',', '', Cart::instance('cart')->tax());
                $shipping = 100;
                $totalAfterDiscount = str_replace(',', '', Cart::instance('cart')->total()) + 100;
            }
            session()->put('checkout', [
                'discount' => $discount,
                'subtotal' => $subtotalAfterDiscount,
                'tax' => $taxAfterDiscount,
                'shipping' => $shipping,
                'total' => $totalAfterDiscount,
            ]);
            session()->forget('coupon');
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
