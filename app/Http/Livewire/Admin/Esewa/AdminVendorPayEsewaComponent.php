<?php

namespace App\Http\Livewire\Admin\Esewa;

use App\Models\Vendor;
use App\Models\VendorPayment;
use SimpleXMLElement;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class AdminVendorPayEsewaComponent extends Component
{

    public function verify()
    {
        $amount = 100;
        $pid = request('oid');
        $payment = VendorPayment::findOrFail($pid);
        if ($payment) {
            $vendor = Vendor::findOrFail($payment->vendor_id);
        }
        $response = Http::asForm()->post('https://uat.esewa.com.np/epay/transrec', [
            'amt' => $amount,
            'scd' => $vendor->merchant_code,
            'rid' => request('refId'),
            'pid' => $pid,
        ]);
        $responseCode = strtolower(trim((new SimpleXMLElement($response->body()))->response_code));
        if ($responseCode == 'success') {
            $payment->payment_status = 'approved';
            $payment->save();
            return redirect()->route('vendor.pay_vendor')->with('vendor_payment_sucess', 'Peyment done sucessfully!!!');
        } else {
            return redirect()->route('vendor.pay_vendor')->with('vendor_payment_error', 'Invalid transaction!!!');
        }
    }

    public function render()
    {
        return view('livewire.admin.esewa.admin-vendor-pay-esewa-component');
    }
}
