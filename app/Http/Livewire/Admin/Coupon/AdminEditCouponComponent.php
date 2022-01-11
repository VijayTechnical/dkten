<?php

namespace App\Http\Livewire\Admin\Coupon;

use App\Models\Coupon;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AdminEditCouponComponent extends Component
{
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $expiry_date;
    public $coupon_id;

    public function mount($coupon_id)
    {
        $this->$coupon_id = $coupon_id;
        $coupon = Coupon::find($this->coupon_id);
        $this->code = $coupon->code;
        $this->type = $coupon->type;
        $this->value = $coupon->value;
        $this->expiry_date = $coupon->expiry_date;
        $this->cart_value = $coupon->cart_value;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'code' => 'required|unique:coupons,code,'.$this->coupon_id,
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required'
        ]);
    }

    public function updateCoupon()
    {
        $this->validate([
            'code' => 'required|unique:coupons,code,'.$this->coupon_id,
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required'
        ]);

        $coupon = Coupon::find($this->coupon_id);
        $coupon->user_id = Auth::guard('admin')->user()->id;
        $coupon->code = $this->code;
        $coupon->type = $this->type;
        $coupon->value = $this->value;
        $coupon->cart_value = $this->cart_value;
        $coupon->expiry_date = $this->expiry_date;
        $coupon->save();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Coupon Updated Successfully!']);
    }


    public function render()
    {
        return view('livewire.admin.coupon.admin-edit-coupon-component')->layout('layouts.admin');
    }
}
