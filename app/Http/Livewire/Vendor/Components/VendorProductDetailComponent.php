<?php

namespace App\Http\Livewire\Vendor\Components;

use App\Models\Product;
use Livewire\Component;

class VendorProductDetailComponent extends Component
{
    public $product;
    protected $listeners = ['open' => 'loadModel'];

    public function loadModel($id)
    {
        $this->product = Product::find($id);
        $this->dispatchBrowserEvent('showProduct');
    }

    public function render()
    {
        return view('livewire.vendor.components.vendor-product-detail-component');
    }
}
