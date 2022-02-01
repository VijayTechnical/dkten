<?php

namespace App\Http\Livewire\Vendor\Sale;

use App\Models\Order;
use Livewire\Component;

class VendorSaleViewComponent extends Component
{
    public $sale_id;

    public function mount($sale_id)
    {
        $this->sale_id = $sale_id;
    }

    public function render()
    {
        $order = Order::find($this->sale_id);
        return view('livewire.vendor.sale.vendor-sale-view-component',['order'=>$order])->layout('layouts.vendor');
    }
}
