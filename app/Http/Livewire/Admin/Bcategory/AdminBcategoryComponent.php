<?php

namespace App\Http\Livewire\Admin\Bcategory;

use Livewire\Component;
use App\Models\Bcategory;
use Livewire\WithPagination;
use App\Traits\RoleAndPermissionTrait;

class AdminBcategoryComponent extends Component
{
    use WithPagination;
    use RoleAndPermissionTrait;

    public $searchTerm;
    public $paginate;

    public function mount()
    {
        $this->paginate = 10;
    }

    public function deleteBcategory($id)
    {
        $this->authorizeRoleOrPermission('master|delete-blog-attribute');
        $vcategory = Bcategory::find($id);
        $vcategory->delete();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Blog Category Deleted Successfully!']
        );
    }

    public function render()
    {
        $bcategories = Bcategory::query()
            ->where('id', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('name', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('slug', 'LIKE', "%{$this->searchTerm}%")
            ->orderBy('created_at', 'ASC')->paginate($this->paginate);
        return view('livewire.admin.bcategory.admin-bcategory-component',['bcategories'=>$bcategories])->layout('layouts.admin');
    }
}
