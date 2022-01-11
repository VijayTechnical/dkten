<?php

namespace App\Http\Livewire\Admin\Coupon;

use App\Models\Coupon;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCouponComponent extends Component
{
    use WithPagination;

    protected $listeners = ['delete'];

    public $searchTerm;
    public $paginate;

    public function mount()
    {
        $this->paginate = 10;
    }


    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal:confirm',[
            'statuscode' => 'warning',
            'title' => '',
            'text' => 'Are you sure, you want to delete?',
            'id' => $id,
        ]);
    }

    public function delete($id)
    {
        $coupon = Coupon::find($id);
        $coupon->delete();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Coupon Deleted Successfully!']);
    }

    public function render()
    {
        $coupons = Coupon::query()
        ->where('id', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('code', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('type', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('value', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('cart_value', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('expiry_date', 'LIKE', "%{$this->searchTerm}%")
        ->orderBy('created_at', 'ASC')->paginate($this->paginate);

        return view('livewire.admin.coupon.admin-coupon-component',['coupons'=>$coupons])->layout('layouts.admin');
    }
}
