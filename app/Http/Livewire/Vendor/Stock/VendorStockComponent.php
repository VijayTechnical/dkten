<?php

namespace App\Http\Livewire\Vendor\Stock;

use App\Models\Stock;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class VendorStockComponent extends Component
{
    use WithPagination;

    public $searchTerm;
    public $paginate;

    public function mount()
    {
        $this->paginate = 10;
    }

    public function deleteStock($id)
    {
        $stock = Stock::find($id);
        if ($stock) {
            $stock->delete();
        }
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Product Stock Deleted Successfully!']
        );
    }

    public function render()
    {
        $stocks = Stock::with('Product')->whereHas('Product', function ($q) {
            $q->where('vendor_id', '=', Auth::guard('vendor')->user()->id)
                ->where('title', 'LIKE', '%' . $this->searchTerm . '%');
        })->orderBy('created_at', 'DESC')->paginate($this->paginate);
        return view('livewire.vendor.stock.vendor-stock-component', ['stocks' => $stocks])->layout('layouts.vendor');
    }
}
