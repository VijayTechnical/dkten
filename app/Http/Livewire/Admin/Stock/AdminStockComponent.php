<?php

namespace App\Http\Livewire\Admin\Stock;

use App\Models\Stock;
use App\Traits\RoleAndPermissionTrait;
use Livewire\Component;
use Livewire\WithPagination;

class AdminStockComponent extends Component
{
    use WithPagination;
    use RoleAndPermissionTrait;

    public $searchTerm;
    public $paginate;

    public function mount()
    {
        $this->paginate = 10;
    }

    public function deleteStock($id)
    {
        $this->authorizeRoleOrPermission('master|delete-stock');
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
        $searchTerm = $this->searchTerm;
        $stocks = Stock::select("*")
            ->where(function ($query) use ($searchTerm) {
                $query->where('entry_type', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('quantity', 'LIKE', '%' . $searchTerm . '%');
            })->orderBy('created_at', 'DESC')->with('Product')->paginate($this->paginate);
        return view('livewire.admin.stock.admin-stock-component',['stocks'=>$stocks])->layout('layouts.admin');
    }
}
