<?php

namespace App\Http\Livewire\Vendor\Product;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class VendorProductComponent extends Component
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
        $searchTerm = $this->searchTerm;
        $products = Product::select("*")
        ->where('vendor_id', Auth::guard('vendor')->user()->id)
        ->where(function($query) use ($searchTerm){
            $query->where('title', 'LIKE', '%'.$searchTerm.'%')
                  ->orWhere('slug', 'LIKE', '%'.$searchTerm.'%')
                  ->orWhere('sale_price', 'LIKE', '%'.$searchTerm.'%')
                  ->orWhere('purchase_price', 'LIKE', '%'.$searchTerm.'%')
                  ->orWhere('unit', 'LIKE', '%'.$searchTerm.'%');
        })
        ->orderBy('created_at','DESC')->paginate($this->paginate);
        return view('livewire.vendor.product.vendor-product-component',['products'=>$products])->layout('layouts.vendor');
    }
}
