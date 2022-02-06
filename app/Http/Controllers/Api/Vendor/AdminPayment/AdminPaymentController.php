<?php

namespace App\Http\Controllers\Api\Vendor\AdminPayment;

use Illuminate\Http\Request;
use App\Models\VendorPayment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminPaymentController extends Controller
{
    public function getPayment()
    {
        try {
            $payments = VendorPayment::query()
                ->where('vendor_id', auth()->user()->id)
                ->get();
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }

        return response()->json([
            'message' => 'Payments found sucessfully',
            'data' => $payments
        ]);
    }

    public function deletePayment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'payment_id' => 'required|integer|exists:vendor_payments,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }
        try {
            $payment = VendorPayment::where(['id'=>$request->payment_id,'vendor_id'=>auth()->user()->id])->firstOrFail();
            $payment->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }

        return response()->json([
            'message' => 'Payments deleted sucessfully',
            'data' => $payment
        ]);
    }
}
