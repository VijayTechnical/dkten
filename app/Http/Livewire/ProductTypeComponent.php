<?php

namespace App\Http\Livewire;

use App\Models\Type;
use App\Models\Brand;
use App\Models\Vendor;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use App\Traits\ProductSearchTrait;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductTypeComponent extends Component
{
    use ProductSearchTrait;

    public $sorting;
    public $paginate;


    public $category_slug;
    public $sub_category_slug;
    public $type_slug;
    public $sub_type_slug;
    public $brand_id;
    public $vendor_id;
    public $searchTerm;

    public $min_price;
    public $max_price;

    public $qty;


    public function mount($category_slug, $sub_category_slug=null, $type_slug = null, $sub_type_slug = null)
    {
        $this->category_slug = $category_slug;
        if($sub_category_slug)
        {
            $this->sub_category_slug = $sub_category_slug;
        }
        if ($type_slug) {
            $this->type_slug = $type_slug;
        }
        if ($sub_type_slug) {
            $this->sub_type_slug = $sub_type_slug;
        }
        $this->sorting = "default";
        $this->paginate = 12;
        $this->min_price = 0;
        $this->max_price = 10000000;
        $this->qty = 1;
    }

    public function store($product_id, $product_title, $product_price)
    {
        $cart_items = Cart::instance('cart')
            ->content()
            ->pluck('id');
        if ($cart_items->contains($product_id)) {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => 'Product is already in your cart!']
            );
        }
        else
        {
            Cart::instance('cart')->add($product_id, $product_title, $this->qty, $product_price)->associate('App\Models\Product');
            $this->emitTo('components.midbar-component', 'refreshComponent');
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'Product is added successfully to cart!']
            );
        }
    }

    public function wishlist($product_id, $product_title, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_title, 1, $product_price)->associate('App\Models\Product');
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Product is added successfully to your wishlist!']
        );
        return;
    }

    public function render()
    {
        $category = Category::where('slug', $this->category_slug)->first();
        $products = $this->searchProduct($this->sorting, $category->id, $this->min_price, $this->max_price, $this->paginate,$this->brand_id, $this->vendor_id, $this->searchTerm);
        if($this->sub_category_slug)
        {
            $sub_category = SubCategory::where('slug', $this->sub_category_slug)->first();
            $products = $this->searchProduct($this->sorting, $category->id, $this->min_price, $this->max_price, $this->paginate, $this->brand_id, $this->vendor_id, $this->searchTerm);
            if ($this->type_slug) {
                $type = Type::where('slug', $this->type_slug)->first();
                $products = $this->searchProduct($this->sorting, $category->id, $this->min_price, $this->max_price, $this->paginate, $this->brand_id, $this->vendor_id, $this->searchTerm,$sub_category->id, $type->id);
                if ($this->sub_type_slug) {
                    $sub_type = Type::where('slug', $this->sub_type_slug)->first();
                    $products = $this->searchProduct($this->sorting, $category->id, $this->min_price, $this->max_price, $this->paginate, $this->brand_id, $this->vendor_id, $this->searchTerm,$sub_category->id, $type->id, $sub_type->id);
                }
            }

        }




        $categories = Category::where('status', true)->get();
        $brands = Brand::where('status', true)->get();
        $vendors = Vendor::where('status', true)->get();

        if (Auth::guard('web')->check()) {
            Cart::instance('cart')->store(Auth::guard('web')->user()->email);
            Cart::instance('wishlist')->store(Auth::guard('web')->user()->email);
        }
        return view('livewire.product-type-component', ['products' => $products, 'categories' => $categories, 'brands' => $brands, 'vendors' => $vendors])->layout('layouts.base');
    }
}
