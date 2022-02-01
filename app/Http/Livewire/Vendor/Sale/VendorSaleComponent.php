<?php

namespace App\Http\Livewire\Vendor\Sale;

use App\Models\Order;
use App\Models\Vendor;
use App\Traits\VendorSaleTrait;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class VendorSaleComponent extends Component
{
    use WithPagination;
    use VendorSaleTrait;

    public $searchTerm;
    public $paginate;

    public function mount()
    {
        $this->paginate = 10;
    }


    public function statusUpdate($id, $status)
    {
        $order = Order::find($id);
        if ($order->status == 'ordered') {
            $order->status = $status;
            if ($status == 'delivered') {
                $order->delivered_date = DB::raw('CURRENT_DATE');
                $order->save();
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'success',  'message' => 'Order status updated successfully!']
                );
            } else if ($status == 'cancelled') {
                $order->cancelled_date = DB::raw('CURRENT_DATE');
                $order->save();
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'success',  'message' => 'Order is cancelled successfully!']
                );
            }
        } else {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => 'Sorry cant change the status!!!']
            );
        }
    }

    public function render()
    {
        $product_ids = $this->getOrders();
        foreach ($product_ids as $product_id) {
            $sales = Order::whereHas('OrderItem', function ($q) use ($product_id) {
                $q->where('product_id', $product_id);
            })->where('sale_code','LIKE','%'.$this->searchTerm.'%')->latest()->paginate($this->paginate);
        }
        return view('livewire.vendor.sale.vendor-sale-component', ['sales' => $sales])->layout('layouts.vendor');
    }
}
