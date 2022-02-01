<?php

namespace App\Http\Livewire\Admin\Coupon;

use App\Models\Coupon;
use App\Traits\RoleAndPermissionTrait;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AdminAddCouponComponent extends Component
{
    use RoleAndPermissionTrait;
    
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $expiry_date;

    public function mount()
    {
        $this->authorizeRoleOrPermission('master|add-coupon');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'code' => 'required|unique:coupons',
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required'
        ]);
    }

    public function storeCoupon()
    {
        $this->validate([
            'code' => 'required|unique:coupons',
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required'
        ]);

        $coupon = new Coupon();
        $coupon->admin_id = Auth::guard('admin')->user()->id;
        $coupon->code = $this->code;
        $coupon->type = $this->type;
        $coupon->value = $this->value;
        $coupon->cart_value = $this->cart_value;
        $coupon->expiry_date = $this->expiry_date;
        $coupon->save();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Coupon Created Successfully!']);


    }

    public function render()
    {
        return view('livewire.admin.coupon.admin-add-coupon-component')->layout('layouts.admin');
    }
}
