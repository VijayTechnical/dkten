<?php

namespace App\Http\Livewire\Admin\Role;

use App\Traits\RoleAndPermissionTrait;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class AdminRoleComponent extends Component
{
    use RoleAndPermissionTrait;
    use WithPagination;

    public $searchTerm;
    public $paginate;

    public function mount()
    {
        $this->paginate = 10;
    }


    public function deleteRole($id)
    {
        $this->authorizeRoleOrPermission('master|delete-role');
        $role = Role::find($id);
        $role->delete();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Role Deleted Successfully!']);
    }


    public function render()
    {
        $roles = Role::query()
        ->where('id', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('name', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('guard_name', 'LIKE', "%{$this->searchTerm}%")
        ->orderBy('created_at', 'ASC')->paginate($this->paginate);
        return view('livewire.admin.role.admin-role-component',['roles'=>$roles])->layout('layouts.admin');
    }
}
