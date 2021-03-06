<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use App\Traits\RoleAndPermissionTrait;
use Livewire\Component;
use Livewire\WithPagination;

class AdminBrandComponent extends Component
{

    use WithPagination;
    use RoleAndPermissionTrait;

    public $paginate;
    public $searchTerm;

    public function mount()
    {
        $this->paginate = 10;
    }

    public function changeStatus($id)
    {
        $this->authorizeRoleOrPermission('master|change-brand-status');
        $brand = Brand::findOrFail($id);
        $brand->status = !$brand->status;
        $brand->save();
    }

    public function deleteBrand($id)
    {
        $this->authorizeRoleOrPermission('master|delete-brand');
        $brand = Brand::find($id);
        if ($brand->image) {
            unlink(storage_path('app/public/brand/' . $brand->image));
        }
        $brand->delete();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Brand Deleted Successfully!']);
    }

    public function render()
    {
        $brands = Brand::query()
        ->where('id', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('name', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('slug', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('status', 'LIKE', "%{$this->searchTerm}%")
        ->orderBy('created_at', 'ASC')->paginate($this->paginate);
        return view('livewire.admin.brand.admin-brand-component',['brands'=>$brands])->layout('layouts.admin');
    }
}
