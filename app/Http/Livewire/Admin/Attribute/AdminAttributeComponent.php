<?php

namespace App\Http\Livewire\Admin\Attribute;

use Livewire\Component;
use App\Models\Attribute;
use Livewire\WithPagination;
use App\Traits\RoleAndPermissionTrait;

class AdminAttributeComponent extends Component
{

    use WithPagination;
    use RoleAndPermissionTrait;

    public $paginate;
    public $searchTerm;

    public function mount()
    {
        $this->paginate = 10;
    }
    public function deleteAttribute($id)
    {
        $this->authorizeRoleOrPermission('master|delete-attribute');
        $attribute = Attribute::find($id);
        $attribute->delete();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Attribute Deleted Successfully!']);
    }

    public function render()
    {
        $attributes = Attribute::query()
        ->where('id', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('name', 'LIKE', "%{$this->searchTerm}%")
        ->orderBy('created_at', 'ASC')->paginate($this->paginate);
        return view('livewire.admin.attribute.admin-attribute-component',['attributes'=>$attributes])->layout('layouts.admin');
    }
}
