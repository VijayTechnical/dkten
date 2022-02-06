<?php

namespace App\Http\Controllers\Api\User\Order;

use App\Models\Order;
use App\Models\Review;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserOrderController extends Controller
{
    public function getOrder()
    {
        try {
            $orders = Order::with('OrderItem', 'Transaction')->where('user_id', auth()->user()->id)->latest()->get();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Orders found sucessfully!',
            'data' => $orders
        ]);
    }

    public function getOrderDetail($sale_code)
    {
        try {
            $order = Order::with('OrderItem', 'Transaction')->where(['sale_code' => $sale_code, 'user_id' => auth()->user()->id])->latest()->get();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Order found sucessfully!',
            'data' => $order
        ]);
    }

    public function cancelOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sale_code' => 'required|numeric|exists:orders,sale_code'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }
        try {
            $order = Order::where(['sale_code' => $request->sale_code, 'user_id' => auth()->user()->id])->firstOrFail();
            if ($order->status != 'cancelled' && $order->status != 'delivered') {
                $order->status = "cancelled";
                $order->cancelled_date = DB::raw('CURRENT_DATE');
                $order->save();
            } else {
                return response()->json([
                    'message' => 'Invalid request!!!'
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Order cancelled sucessfully!',
            'data' => $order
        ]);
    }

    public function saveReview(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order_item_id' => 'required|numeric|exists:order_items,id',
            'rating' => 'required|numeric',
            'comment' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }
        try {
            $orderItem = OrderItem::findOrFail($request->order_item_id);
            if ($orderItem->rstatus == true) {
                return response()->json([
                    'message' => 'Invalid request!!!'
                ], 403);
            } else {
                $review = new Review();
                $review->rating = $request->rating;
                $review->comment = $request->comment;
                $review->order_item_id = $request->order_item_id;
                $review->save();
                $orderItem->rstatus = true;
                $orderItem->save();
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Review added sucessfully!',
            'data' => $review
        ]);
    }

    public function getPayment($sale_code)
    {
        $payment = collect();
        try {
            $order = Order::where('sale_code', $sale_code)->firstOrFail();
            $payment->push(['payment_mode' => $order->Transaction->PaymentMode->name, 'payment_status' => $order->Transaction->status]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Payment mode name found sucessfully!',
            'data' => $payment
        ]);
    }
}
