<?php

namespace App\Http\Livewire\Admin\Sale;

use App\Models\Order;
use Livewire\Component;

class AdminViewSaleComponent extends Component
{
    public $sale_id;

    public function mount($sale_id)
    {
        $this->sale_id = $sale_id;
    }

    public function render()
    {
        $order = Order::find($this->sale_id);
        return view('livewire.admin.sale.admin-view-sale-component',['order'=>$order])->layout('layouts.admin');
    }
}
