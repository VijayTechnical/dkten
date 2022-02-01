<?php

namespace App\Http\Livewire\Admin\Role;

use App\Traits\RoleAndPermissionTrait;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminAddRoleComponent extends Component
{
    use RoleAndPermissionTrait;

    public $name;
    public $sel_permissions = [];

    public function mount()
    {
        $this->authorizeRoleOrPermission('master|add-role');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required|unique:roles'
        ]);
    }

    public function addRole()
    {
        $this->validate([
            'name' => 'required|unique:roles'
        ]);

        $role = new Role();
        $role->name = $this->name;
        $role->syncPermissions($this->sel_permissions);
        $role->save();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Role Created Successfully!']);
    }

    public function render()
    {
        $permissions = Permission::orderBy('created_at', 'DESC')->get();
        return view('livewire.admin.role.admin-add-role-component', ['permissions' => $permissions])->layout('layouts.admin');
    }
}
