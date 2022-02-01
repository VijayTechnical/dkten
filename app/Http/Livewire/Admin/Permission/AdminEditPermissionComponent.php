<?php

namespace App\Http\Livewire\Admin\Permission;

use App\Traits\RoleAndPermissionTrait;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class AdminEditPermissionComponent extends Component
{
    use RoleAndPermissionTrait;
    
    public $name;
    public $permission_id;

    public function mount($permission_id)
    {
        $this->authorizeRoleOrPermission('master|edit-permission');
        $this->permission_id = $permission_id;
        $permission = Permission::find($this->permission_id);
        $this->name = $permission->name;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required|unique:permissions,name,'.$this->permission_id
        ]);
    }

    public function editPermission()
    {
        $this->validate([
            'name' => 'required|unique:permissions,name,'.$this->permission_id
        ]);

        $permission = Permission::find($this->permission_id);
        $permission->name = $this->name;
        $permission->save();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Permission Updated Successfully!']
        );
    }


    public function render()
    {
        return view('livewire.admin.permission.admin-edit-permission-component')->layout('layouts.admin');
    }
}
