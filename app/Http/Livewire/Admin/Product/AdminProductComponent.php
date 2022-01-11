<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{
    use WithPagination;

    public $paginate;
    public $searchTerm;

    public function mount()
    {
        $this->paginate = 10;
    }

    public function editPublish($id)
    {
        $product = Product::find($id);
        $product->status = !$product->status;
        $product->save();
    }

    public function editDeal($id)
    {
        $product = Product::find($id);
        $product->t_deal = !$product->t_deal;
        $product->save();
    }

    public function editFeatured($id)
    {
        $product = Product::find($id);
        $product->featured = !$product->featured;
        $product->save();
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if($product->images)
        {
            $images = explode(",",$product->images);
            if($images)
            {
                foreach($images as $key=>$image)
                {
                    if($image)
                    {
                        unlink(storage_path('app/public/product/'.$image));
                    }
                }
            }
        }
        $product->delete();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Product Deleted Successfully!']);
    }

    public function render()
    {
        $products = Product::query()
        ->where('id', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('title', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('sale_price', 'LIKE', "%{$this->searchTerm}%")
        ->orderBy('created_at', 'ASC')->paginate($this->paginate);
        return view('livewire.admin.product.admin-product-component',['products'=>$products])->layout('layouts.admin');
    }
}
