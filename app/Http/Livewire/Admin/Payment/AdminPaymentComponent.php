<?php

namespace App\Http\Livewire\Admin\Payment;

use App\Models\Payment;
use Livewire\Component;
use Livewire\WithPagination;

class AdminPaymentComponent extends Component
{
    use WithPagination;

    public $paginate;
    public $searchTerm;

    public function mount()
    {
        $this->paginate = 10;
    }

    public function deletePayment($id)
    {
        $payment = Payment::find($id);
        if ($payment->image) {
            unlink(storage_path('app/public/payment/' . $payment->image));
        }
        $payment->delete();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'payment Deleted Successfully!']);
    }

    public function render()
    {
        $payments = Payment::query()
        ->where('id', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('name', 'LIKE', "%{$this->searchTerm}%")
        ->orderBy('created_at', 'ASC')->paginate($this->paginate);
        return view('livewire.admin.payment.admin-payment-component',['payments'=>$payments])->layout('layouts.admin');
    }
}
