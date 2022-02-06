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


    public $category_id;
    public $sub_category_id;
    public $type_id;
    public $sub_type_id;
    public $brand_id;
    public $vendor_id;
    public $searchTerm;

    public $min_price;
    public $max_price;

    public $qty;


    public function mount($category_id, $sub_category_id = null, $type_id = null, $sub_type_id = null)
    {
        $this->category_id = $category_id;
        if ($sub_category_id) {
            $this->sub_category_id = $sub_category_id;
        }
        if ($type_id) {
            $this->type_id = $type_id;
        }
        if ($sub_type_id) {
            $this->sub_type_id = $sub_type_id;
        }
        $this->sorting = "default";
        $this->paginate = 12;
        $this->min_price = 0;
        $this->max_price = 10000000;
        $this->qty = 1;
    }

    public function addToCompare()
    {
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Product added sucessfully to compare!']
        );
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
        } else {
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
        if (Auth::guard('web')->user()) {
            Cart::instance('cart')->restore(Auth::guard('web')->user()->email);
            Cart::instance('wishlist')->restore(Auth::guard('web')->user()->email);
            Cart::instance('compare')->restore(Auth::guard('web')->user()->email);
        }

        $category = Category::where('id', $this->category_id)->first();
        $products = $this->searchProductByCategory($this->sorting, $category->id, $this->min_price, $this->max_price, $this->paginate, $this->searchTerm, $this->brand_id, $this->vendor_id);
        if ($this->sub_category_id) {
            $sub_category = SubCategory::where('id', $this->sub_category_id)->first();
            $products = $this->searchProductBySubCategory($this->sorting, $category->id, $this->min_price, $this->max_price, $this->paginate, $this->searchTerm, $sub_category->id, $this->brand_id, $this->vendor_id);
            if ($this->type_id) {
                $type = Type::where('id', $this->type_id)->first();
                $products = $this->searchProductByType($this->sorting, $category->id, $this->min_price, $this->max_price, $this->paginate, $this->searchTerm, $sub_category->id, $type->id, $this->brand_id, $this->vendor_id);
                if ($this->sub_type_id) {
                    $sub_type = Type::where('id', $this->sub_type_id)->first();
                    $products = $this->searchProductBySubType($this->sorting, $category->id, $this->min_price, $this->max_price, $this->paginate, $this->searchTerm, $sub_category->id, $type->id, $sub_type->id, $this->brand_id, $this->vendor_id);
                }
            }
        }

        $categories = Category::where('status', true)->get();
        $brands = Brand::where('status', true)->get();
        $vendors = Vendor::where('status', true)->get();
        $popular_products = Product::MostViewed()->latest()->Status()->offset(0)->limit(3)->get();
        $deal_products = Product::TDeal()->Status()->latest()->offset(0)->limit(3)->get();
        $latest_products = Product::Status()->latest()->offset(0)->limit(3)->get();
        return view('livewire.product-type-component', ['products' => $products, 'categories' => $categories, 'brands' => $brands, 'vendors' => $vendors, 'popular_products' => $popular_products, 'deal_products' => $deal_products, 'latest_products' => $latest_products])->layout('layouts.base');
    }
}
