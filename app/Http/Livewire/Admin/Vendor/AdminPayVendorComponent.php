<?php

namespace App\Http\Livewire\Admin\Vendor;

use App\Classes\GetTotalVendor;
use App\Models\Vendor;
use App\Models\VendorPayment;
use Livewire\Component;

class AdminPayVendorComponent extends Component
{
    public $vendor_id;
    public $total_amount;
    public $paid_amount;
    public $commision_percent;
    public $commision_amount;
    public $payment_method;
    public $payment_id;
    public $merchant_id;

    public function setTotal()
    {
        $vendor = Vendor::where('id', $this->vendor_id)->firstOrFail();
        if ($vendor) {
            $this->merchant_id = $vendor->merchant_code;
            dd($this->merchant_id);
        }
        $total = str_replace('.', '', GetTotalVendor::getTotal($this->vendor_id));
        $this->total_amount = $total;
        $commision = GetTotalVendor::getCommision($this->vendor_id, $this->total_amount);
        $this->commision_percent = $commision['percent'];
        $this->commision_amount = $commision['amount'];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'vendor_id' => 'required|integer|exists:vendors,id',
            'total_amount' => 'required|numeric',
            'paid_amount' => 'required|numeric',
            'commision_percent' => 'required|integer',
            'commision_amount' => 'required|numeric',
            'payment_method' => 'required|string'
        ]);
    }


    public function payToVendor()
    {
        $this->validate([
            'vendor_id' => 'required|integer|exists:vendors,id',
            'total_amount' => 'required|numeric',
            'paid_amount' => 'required|numeric',
            'commision_percent' => 'required|integer',
            'commision_amount' => 'required|numeric',
            'payment_method' => 'required|string'
        ]);

        try {
            $payment = new VendorPayment();
            $payment->vendor_id = $this->vendor_id;
            $payment->total_amount = $this->total_amount;
            $payment->paid_amount = $this->paid_amount;
            $payment->commision_percent = $this->commision_percent;
            $payment->commision_amount = $this->commision_amount;
            $payment->payment_method = $this->payment_method;
            $payment->payment_status = 'pending';
            $payment->save();
            $this->dispatchBrowserEvent('submitEsewa');
            $this->payment_id = $payment->id;
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => $e->getMessage()]
            );
        }
    }


    public function render()
    {
        $vendors = Vendor::where('status', true)->latest()->get();
        return view('livewire.admin.vendor.admin-pay-vendor-component', ['vendors' => $vendors])->layout('layouts.admin');
    }
}
