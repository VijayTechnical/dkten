<?php

namespace App\Http\Livewire\Admin\Stock;

use App\Models\Stock;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use App\Traits\RoleAndPermissionTrait;

class AdminDestroyStockComponent extends Component
{ 
    use RoleAndPermissionTrait;

    public $category_id;
    public $product_id;
    public $sub_category_id;
    public $quantity;
    public $monetary_loss;
    public $reason_note;

    public function mount()
    {
        $this->authorizeRoleOrPermission('master|destroy-stock');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'category_id' => 'required|integer',
            'product_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'quantity' => 'required|integer',
            'monetary_loss' => 'required|integer',
            'reason_note' => 'required',
        ]);
    }

    public function destroyStock()
    {
        $this->validate([
            'category_id' => 'required|integer',
            'product_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'quantity' => 'required|integer',
            'monetary_loss' => 'required|integer',
            'reason_note' => 'required',
        ]);
        $stock = new Stock();
        $stock->category_id = $this->category_id;
        $stock->product_id = $this->product_id;
        $stock->sub_category_id = $this->sub_category_id;
        $stock->quantity = $this->quantity;
        $stock->monetary_loss = $this->monetary_loss;
        $stock->entry_type = 'destroy';
        if ($this->reason_note) {
            $stock->reason_note = $this->reason_note;
        }
        $stock->save();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Product Stock Destroyed Successfully!']);
    }

    public function render()
    {
        $categories = Category::where('status',true)->orderBy('created_at','DESC')->get();
        $sub_categories = SubCategory::where('category_id', $this->category_id)->where('status',true)->orderBy('created_at','DESC')->get();
        $products = Product::where('category_id', $this->category_id)->where('status',true)->where('sub_category_id', $this->sub_category_id)->get();
        return view('livewire.admin.stock.admin-destroy-stock-component', ['categories' => $categories, 'sub_categories' => $sub_categories, 'products' => $products])->layout('layouts.admin');
    }
}
