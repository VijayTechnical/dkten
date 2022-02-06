<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Models\VendorPayment;

class VendorAdminEsewaVerifyController extends Controller
{
    public function verifyNext(Request $request)
    {
        $amount = 100;
        $pid = $request['oid'];
        $payment = VendorPayment::findOrFail($pid);
        if ($payment) {
            $vendor = Vendor::findOrFail($payment->vendor_id);
        }

        $url = "https://uat.esewa.com.np/epay/transrec";
        $data = [
            'amt' => $amount,
            'scd' => $vendor->merchant_code,
            'rid' => request('refId'),
            'pid' => $pid,
        ];

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        if ($response == 'success') {
            $payment->payment_status = 'approved';
            $payment->save();
            return redirect()->route('vendor.pay_vendor')->with('vendor_payment_sucess', 'Peyment done sucessfully!!!');
        } else {
            return redirect()->route('vendor.pay_vendor')->with('vendor_payment_error', 'Invalid transaction!!!');
        }
    }

    public function sendBack()
    {
         return redirect()->route('vendor.pay_vendor')->with('vendor_payment_error', 'Invalid transaction!!!');
    }
}
