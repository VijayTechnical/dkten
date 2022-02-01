<?php

namespace App\Http\Livewire\User\Order;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class UserOrderComponent extends Component
{
    use WithPagination;

    public $sale_code;
    public $status;
    public $cancelled_date;
    public $delivered_date;
    public $created_date;
    public $paginate;

    public function mount()
    {
        $this->paginate = 5;
    }

    public function getStatus()
    {
        $order = Order::where('sale_code',$this->sale_code)->first();
        $this->status = $order->status;
        if($order->status =='cancelled')
        {
            $this->cancelled_date = $order->cancelled_date;
        }
        elseif($order->status =='delivered')
        {
            $this->delivered_date = $order->delivered_date;  
        }
        else{
            $this->created_date = $order->created_at;
        }
    }

    public function render()
    {
        $orders = Order::where('user_id',Auth::guard('web')->user()->id)->latest()->paginate($this->paginate);
        return view('livewire.user.order.user-order-component',['orders'=>$orders])->layout('layouts.base');
    }
}
