<?php

namespace App\Http\Livewire\Admin\Permission;

use App\Traits\RoleAndPermissionTrait;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class AdminAddPermissionComponent extends Component
{
    use RoleAndPermissionTrait;

    public $name;

    public function mount()
    {
        $this->authorizeRoleOrPermission('master|add-permission');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required|unique:permissions'
        ]);
    }

    public function addPermission()
    {
        $this->validate([
            'name' => 'required|unique:permissions'
        ]);

        $permission = new Permission();
        $permission->name = $this->name;
        $permission->save();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Permission Added Successfully!']
        );
    }

    public function render()
    {
        return view('livewire.admin.permission.admin-add-permission-component')->layout('layouts.admin');
    }
}
