<?php

namespace App\Http\Livewire\Admin\Role;

use App\Traits\RoleAndPermissionTrait;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminEditRoleComponent extends Component
{
    use RoleAndPermissionTrait;

    public $name;
    public $role_id;
    public $sel_permissions;

    public function mount($role_id)
    {
        $this->authorizeRoleOrPermission('master|edit-role');
        $this->role_id = $role_id;
        $role = Role::find($this->role_id);
        $this->name = $role->name;
        $this->sel_permissions = $role->permissions()->pluck('id')->toArray();
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required|unique:roles,name,'.$this->role_id
        ]);
    }

    public function editRole()
    {
        $this->validate([
            'name' => 'required|unique:roles,name,'.$this->role_id
        ]);

        $role = Role::find($this->role_id);
        $role->name = $this->name;
        $role->syncPermissions($this->sel_permissions);
        $role->save();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Role Updated Successfully!']
        );
    }


    public function render()
    {
        $permissions = Permission::orderBy('created_at','DESC')->get();
        return view('livewire.admin.role.admin-edit-role-component',['permissions'=>$permissions])->layout('layouts.admin');
    }
}
