<?php

namespace App\Http\Livewire\Admin\Report;

use Carbon\Carbon;
use App\Models\Stock;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminReportComponent extends Component
{
    public $category_id;
    public $sub_category_id;
    public $product_id;
    public $graph_date;
    public $graph_quantity;

    protected $listeners = ['setStatus' => 'setStatus'];

    public function setStatus()
    {
        if ($this->product_id) {
            $this->dispatchBrowserEvent('name-updated');
        }

        $this->graph_date = collect();
        $this->graph_quantity = collect();

        for ($i = 0; $i <= 7; $i++) {
            $total_quantity = 0;
            $date = Carbon::now()->copy()->subDays($i)->toDateString();
            $stocks = Stock::where('product_id', $this->product_id)->whereDate('created_at', '<=', $date)->get();
            if ($stocks->count() > 0) {
                $total_quantity = $total_quantity + ($stocks->where('entry_type', 'add')->sum('quantity') -  $stocks->where('entry_type', 'destroy')->sum('quantity'));
            }
            $this->graph_date->push($date);
            $this->graph_quantity->push($total_quantity);
        }
    }


    public function render()
    {
        $categories = Category::where('status', true)->orderBy('created_at', 'DESC')->get();
        $sub_categories = SubCategory::where('category_id', $this->category_id)->where('status', true)->orderBy('created_at', 'DESC')->get();
        $products = Product::where('category_id', $this->category_id)->where('status', true)->where('sub_category_id', $this->sub_category_id)->get();
        return view('livewire.admin.report.admin-report-component', ['categories' => $categories, 'sub_categories' => $sub_categories, 'products' => $products])->layout('layouts.admin');
    }
}
