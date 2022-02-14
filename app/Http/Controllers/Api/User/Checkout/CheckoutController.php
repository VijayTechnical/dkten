<?php

namespace App\Http\Controllers\Api\User\Checkout;

use Carbon\Carbon;
use App\Models\Area;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Payment;
use App\Classes\Checkout;
use App\Classes\StockStatus;
use Illuminate\Http\Request;
use App\Classes\CalculateDiscount;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{

    public function __construct()
    {
        if (auth()->user()) {
            Cart::instance('cart')->restore(auth()->user()->email);
            Cart::instance('wishlist')->restore(auth()->user()->email);
            Cart::instance('compare')->restore(auth()->user()->email);
        }
    }


    public function applyCouponCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'coupon_code' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }

        try {
            $coupon = Coupon::where('code', $request->coupon_code)->where('expiry_date', '>=', Carbon::today())->where('cart_value', '<=', Cart::instance('cart')->subtotal())->firstOrFail();
            if (!$coupon) {
                return response()->json([
                    'message' => 'Invalid coupon code!!!',
                ], 403);
            }
            session()->put('coupon', [
                'code' => $coupon->code,
                'type' => $coupon->type,
                'value' => $coupon->value,
                'cart_value' => $coupon->cart_value
            ]);
            CalculateDiscount::calculateDiscounts();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Coupon is applied Successfully!',
        ]);
    }

    public function getCheckoutAmount(Request $request)
    {
        if (CalculateDiscount::getCartStatus() != true) {
            return response()->json(['message' => 'No items in cart']);
        }
        $area = Area::findOrFail($request->area_id);
        CalculateDiscount::calculateDiscounts($area->shipping_cost);
        try {
            $checkout = session()->get('checkout');
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Checkout session found sucessfully!',
            'data' => $checkout
        ]);
    }

    public function proceedToCheckout(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|string|numeric',
            'email' => 'required|string|email',
            'line1' => 'required|string',
            'line2' => 'required|string',
            'zip' => 'required|numeric',
            'region_id' => 'required|integer|exists:regions,id',
            'city_id' => 'required|integer|exists:cities,id',
            'area_id' => 'required|integer|exists:areas,id',
            'payment_mode_id' => 'required|integer|exists:payments,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }

        try {
            if (!in_array(false, StockStatus::getCartProductStatus()) && $request->payment_mode_id) {
                $order = new Order();
                $sale_code = rand(100000, 999999);
                Log::info("sale_code = " . $sale_code);
                $order->sale_code = $sale_code;
                $order->user_id = auth()->user()->id;
                $order->subtotal = str_replace(",", "", session()->get('checkout')['subtotal']);
                $order->discount = str_replace(",", "", session()->get('checkout')['discount']);
                $order->tax = str_replace(",", "", session()->get('checkout')['tax']);
                $order->total = str_replace(",", "", session()->get('checkout')['total']);
                $order->shipping_cost = str_replace(",", "", session()->get('checkout')['shipping']);
                $order->firstname =  $request->first_name;
                $order->lastname =  $request->last_name;
                $order->mobile =  $request->phone;
                $order->email =  $request->email;
                $order->line1 =  $request->line1;
                $order->line2 =  $request->line2;
                $order->zip =  $request->zip;
                $order->region_id = $request->region_id;
                $order->city_id = $request->city_id;
                $order->area_id = $request->area_id;
                $order->status = 'ordered';
                $order->save();
            } else {
                return response()->json([
                    'message' => 'One of the product in your cart is out of stock!!!'
                ], 403);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }

        $payment = Payment::where('id', $request->payment_mode_id)->firstOrFail();
        $paymentmode = $payment->name;
        if ($paymentmode == 'cash_on_delivery') {
            if (Checkout::setOrders($order->id) == true) {
                if (Checkout::makeTransaction($order->id, $request->payment_mode_id, 'pending') == true) {
                    if (Checkout::resetCart($order->id) == true) {
                        return response()->json([
                            'message' => 'Order is placed sucessfully',
                            'data' => $order
                        ]);
                    } else {
                        return response()->json([
                            'message' => Checkout::resetCart($order->id)
                        ], 400);
                    }
                } else {
                    return response()->json([
                        'message' => Checkout::makeTransaction($order->id, $request->payment_mode_id, 'pending')
                    ], 400);
                }
            } else {
                return response()->json([
                    'message' => Checkout::setOrders($order->id)
                ], 400);
            }
        } elseif ($paymentmode == 'wallet') {
            if (Checkout::checkWallet() == true) {
                if (Checkout::setOrders($order->id) == true) {
                    if (Checkout::makeTransaction($order->id, $request->payment_mode_id, 'approved') == true) {
                        if (Checkout::resetCart($order->id) == true) {
                            return response()->json([
                                'message' => 'Order is placed sucessfully',
                                'data' => $order
                            ]);
                        } else {
                            return response()->json([
                                'message' => Checkout::resetCart($order->id)
                            ], 400);
                        }
                    } else {
                        return response()->json([
                            'message' => Checkout::makeTransaction($order->id, $request->payment_mode_id, 'approved')
                        ], 400);
                    }
                } else {
                    return response()->json([
                        'message' => Checkout::setOrders($order->id)
                    ], 400);
                }
            } else {
                return response()->json([
                    'message' => 'You do not have enough balance on your wallet!!!'
                ], 400);
            }
        } elseif ($paymentmode == 'esewa') {
        } elseif ($paymentmode == 'khalti') {
        } elseif ($paymentmode == 'ime_pay') {
        }
    }

    public function verifyEsewaRequest(Request $request)
    {

    }
}
