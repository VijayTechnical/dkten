<?php

namespace App\Http\Livewire\Vendor\Payment;

use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class VendorUpdateMerchantComponent extends Component
{
    public $merchant_id;

    public function mount()
    {
        $this->merchant_id = Auth::guard('vendor')->user()->merchant_code;
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'merchant_id' => 'required'
        ]); 
    }

    public function updateEsewaMerchantId()
    {
        $this->validate([
            'merchant_id' => 'required'
        ]);

        $vendor = Vendor::findOrFail(Auth::guard('vendor')->user()->id);
        $vendor->merchant_code = $this->merchant_id;
        $vendor->save();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Esewa Merchant Id Updated Successfully!']);
    }


    public function render()
    {
        return view('livewire.vendor.payment.vendor-update-merchant-component')->layout('layouts.vendor');
    }
}
