<?php

namespace App\Http\Livewire\Admin\Payment;

use Carbon\Carbon;
use App\Models\Payment;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddPaymentComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $image;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'image' => 'required|mimes:png,jpg,svg'
        ]);
    }

    public function addPayment()
    {
        $this->validate([
            'name' => 'required',
        ]);

        $payment = new Payment();
        $payment->name = $this->name;
        if ($this->image) {
            $this->validate([
                'image' => 'required|mimes:png,jpg,svg'
            ]);
            $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
            $this->image->storeAS('public/payment', $imageName);
            $payment->image = $imageName;
        }
        $payment->save();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Payment Created Successfully!']);
    }

    public function render()
    {
        return view('livewire.admin.payment.admin-add-payment-component')->layout('layouts.admin');
    }
}
