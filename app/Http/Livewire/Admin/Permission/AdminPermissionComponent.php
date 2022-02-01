<?php

namespace App\Http\Livewire\Admin\Permission;

use App\Traits\RoleAndPermissionTrait;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class AdminPermissionComponent extends Component
{
    use RoleAndPermissionTrait;
    use WithPagination;


    public $searchTerm;
    public $paginate;

    public function mount()
    {
        $this->paginate = 10;
    }

    public function deletePermission($id)
    {
        $this->authorizeRoleOrPermission('master|delete-permission');
        $permission = Permission::find($id);
        $permission->delete();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Permission Deleted Successfully!']
        );
    }

    public function render()
    {
        $permissions = Permission::query()
        ->where('id', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('name', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('guard_name', 'LIKE', "%{$this->searchTerm}%")
        ->orderBy('created_at', 'ASC')->paginate($this->paginate);
        return view('livewire.admin.permission.admin-permission-component',['permissions'=>$permissions])->layout('layouts.admin');
    }
}
