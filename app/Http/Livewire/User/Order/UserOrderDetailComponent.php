<?php

namespace App\Http\Livewire\User\Order;

use App\Models\Logo;
use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserOrderDetailComponent extends Component
{
    public $order_id;

    public function mount($order_id)
    {
        $order = Order::where('id',$order_id)->first();
        $this->order_id = $order->id;
    }
    public function render()
    {
        $order = Order::where('user_id', Auth::guard('web')->user()->id)->where('id',$this->order_id)->first();
        $logo = Logo::find(1);
        return view('livewire.user.order.user-order-detail-component',['order'=>$order,'logo'=>$logo])->layout('layouts.base');
    }
}
