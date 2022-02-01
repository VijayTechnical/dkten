<?php

namespace App\Http\Livewire\Admin\Payment;

use Carbon\Carbon;
use App\Models\Payment;
use App\Traits\RoleAndPermissionTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditPaymentComponent extends Component
{
    use WithFileUploads;
    use RoleAndPermissionTrait;

    public $name;
    public $image;
    public $newimage;
    public $payment_id;

    public function mount($payment_id)
    {
        $this->authorizeRoleOrPermission('master|edit-payment-method');
        $payment = Payment::where('id', $payment_id)->first();
        $this->payment_id = $payment->id;
        $this->name = $payment->name;
        $this->image = $payment->image;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'newimage' => 'required|mimes:png,jpg,svg'
        ]);
    }

    public function editPayment()
    {
        $this->validate([
            'name' => 'required',
        ]);


        $payment = payment::find($this->payment_id);
        $payment->name = $this->name;
        if ($this->newimage) {
            $this->validate([
                'newimage' => 'required|mimes:png,jpg,svg'
            ]);
            if ($payment->image) {
                unlink(storage_path('app/public/payment/' . $payment->image));
            }
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAS('public/payment', $imageName);
            $payment->image = $imageName;
        } else {
            $payment->image = $this->image;
        }
        $payment->save();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Payment Updated Successfully!']);
    }


    public function render()
    {
        return view('livewire.admin.payment.admin-edit-payment-component')->layout('layouts.admin');
    }
}
