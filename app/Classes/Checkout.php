<?php

namespace App\Classes;

use App\Models\Stock;
use SimpleXMLElement;
use App\Models\Payment;
use App\Models\Product;
use App\Mail\InvoiceMail;
use App\Models\OrderItem;
use App\Models\Transaction;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Gloudemans\Shoppingcart\Facades\Cart;

class Checkout
{

    public static function makeTransaction($order_id, $payment_mode_id, $status)
    {
        try {
            $transaction = new Transaction();
            $transaction->user_id = auth()->user()->id;
            $transaction->order_id = $order_id;
            $transaction->payment_mode_id = $payment_mode_id;
            $transaction->status = $status;
            $transaction->save();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    public static function setOrders($order_id)
    {
        try {
            foreach (Cart::instance('cart')->content() as $item) {
                $product = Product::where('id', $item->id)->firstOrFail();
                $orderItem = new OrderItem();
                $orderItem->product_id = $item->id;
                $orderItem->order_id = $order_id;
                $orderItem->price = $item->price;
                $orderItem->quantity = $item->qty;
                $orderItem->save();
                $stock = new Stock();
                $stock->category_id = $product->category_id;
                $stock->product_id = $product->id;
                $stock->sub_category_id = $product->sub_category_id;
                $stock->quantity = $item->qty;
                $stock->entry_type = 'destroy';
                $stock->reason_note = 'sale';
                $stock->save();
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    public static function resetCart($order_id)
    {
        try {
            $owners = collect();
            foreach (Cart::instance('cart')->content() as $item) {
                $owners->push(get_product_owner($item->id));
            }
            if ($owners->count() > 0) {
                foreach ($owners as $owner) {
                    Mail::to($owner)->send(new InvoiceMail($order_id));
                }
            }
            Mail::to(auth()->user()->email)->send(new InvoiceMail($order_id));
            Mail::to('dkten@gmail.com')->send(new InvoiceMail($order_id));
            Cart::instance('cart')->destroy(auth()->user()->email);
            session()->forget('checkout');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    public static function checkWallet()
    {
        $totalWalletBalance = auth()->user()->balance;
        $total = str_replace(',', '', session()->get('checkout')['total']);
        if ($totalWalletBalance >= $total) {
            return true;
        } else {
            return false;
        }
    }

    public static function sendEsewaRequest($order_id)
    {
        try {
            $url = "https://uat.esewa.com.np/epay/main";
            $data = [
                'amt' => 90,
                'pdc' => 3,
                'psc' => 3,
                'txAmt' => 5,
                'tAmt' => 100,
                'pid' => $order_id,
                'scd' => config('app.esewa_merchent'),
                'su' => 'http://localhost:8000/api/user/proceed-to-checkout/esewa-verify?q=su',
                'fu' => 'http://localhost:8000/api/user/proceed-to-checkout/esewa-verify?q=fu'
            ];

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($curl);
            curl_close($curl);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return $response;
    }
}
