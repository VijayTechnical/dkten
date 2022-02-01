<?php

namespace App\Http\Livewire\Admin\Vcategory;

use Livewire\Component;
use App\Models\Vcategory;
use App\Traits\RoleAndPermissionTrait;
use Livewire\WithPagination;

class AdminVcategoryComponent extends Component
{
    use WithPagination;
    use RoleAndPermissionTrait;

    public $searchTerm;
    public $paginate;

    public function mount()
    {
        $this->paginate = 10;
    }

    public function deleteVcategory($id)
    {
        $this->authorizeRoleOrPermission('master|delete-vcategory');
        $vcategory = Vcategory::find($id);
        if ($vcategory->image) {
            unlink(storage_path('app/public/vcategory/' . $vcategory->image));
        }
        $vcategory->delete();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Vendor Category Deleted Successfully!']
        );
    }

    public function render()
    {
        $vcategories = Vcategory::query()
            ->where('id', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('name', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('slug', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('description', 'LIKE', "%{$this->searchTerm}%")
            ->orderBy('created_at', 'ASC')->paginate($this->paginate);
        return view('livewire.admin.vcategory.admin-vcategory-component',['vcategories'=>$vcategories])->layout('layouts.admin');
    }
}
