<?php

namespace App\Http\Livewire\Vendor\Payment;

use App\Models\VendorPayment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class VendorPaymentFromAdminComponent extends Component
{
    use WithPagination;

    public $searchTerm;
    public $paginate;

    public function mount()
    {
        $this->paginate = 10;
    }

    public function deletePayment($payment_id)
    {
        $payment = VendorPayment::where('id', $payment_id)->firstOrFail();
        $payment->delete();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Peyment Deleted Successfully!']
        );
    }
    public function render()
    {
        $payments = VendorPayment::query()
            ->where('vendor_id', Auth::guard('vendor')->user()->id)
            ->where('total_amount','LIKE','%'.$this->searchTerm.'%')
            ->paginate($this->paginate);
        return view('livewire.vendor.payment.vendor-payment-from-admin-component', ['payments' => $payments])->layout('layouts.vendor');
    }
}
