<?php

namespace App\Http\Livewire\Admin\Sale;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class AdminSaleComponent extends Component
{
    use WithPagination;

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
        $sales = Order::query()
            ->where('id', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('firstname', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('sale_code', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('lastname', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('email', 'LIKE', "%{$this->searchTerm}%")
            ->orderBy('created_at', 'DESC')->paginate($this->paginate);
        return view('livewire.admin.sale.admin-sale-component', ['sales' => $sales])->layout('layouts.admin');
    }
}
