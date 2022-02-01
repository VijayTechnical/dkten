<?php

namespace App\Http\Livewire\Admin\Stock;

use App\Models\Stock;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use App\Traits\RoleAndPermissionTrait;

class AdminAddStockComponent extends Component
{
    use RoleAndPermissionTrait;

    public $category_id;
    public $product_id;
    public $sub_category_id;
    public $quantity;
    public $rate;
    public $total;
    public $entry_note;
    public $entry_type;

    public function mount()
    {
        $this->authorizeRoleOrPermission('master|add-stock');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'category_id' => 'required|integer',
            'product_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'quantity' => 'required|integer',
            'rate' => 'required|integer',
            'total' => 'required|integer',
            'entry_note' => 'required'
        ]);
    }
    public function setRate()
    {
        $sel_product = Product::where('id', $this->product_id)->first();
        $this->rate = (int)$sel_product->sale_price;
        $this->total = $this->rate;
    }

    public function setTotal()
    {
        $this->total = $this->rate * $this->quantity;
    }
    public function addStock()
    {
        $this->validate([
            'category_id' => 'required|integer',
            'product_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'quantity' => 'required|integer',
            'rate' => 'required|integer',
            'total' => 'required|integer',
            'entry_note' => 'required'
        ]);

        $stock = new Stock();
        $stock->category_id = $this->category_id;
        $stock->product_id = $this->product_id;
        $stock->sub_category_id = $this->sub_category_id;
        $stock->quantity = $this->quantity;
        $stock->rate = $this->rate;
        $stock->total = $this->total;
        if ($this->entry_note) {
            $stock->reason_note = $this->entry_note;
        }
        $stock->save();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Product Stock Added Successfully!']
        );
    }

    public function render()
    {
        $categories = Category::where('status',true)->orderBy('created_at','DESC')->get();
        $sub_categories = SubCategory::where('category_id', $this->category_id)->where('status',true)->orderBy('created_at','DESC')->get();
        $products = Product::where('category_id', $this->category_id)->where('status',true)->where('sub_category_id', $this->sub_category_id)->get();
        return view('livewire.admin.stock.admin-add-stock-component', ['categories' => $categories, 'sub_categories' => $sub_categories, 'products' => $products])->layout('layouts.admin');
    }
}
