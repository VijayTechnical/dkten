<?php

namespace App\Http\Livewire\Admin\Staff;

use App\Models\Admin;
use App\Traits\RoleAndPermissionTrait;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class AdminEditStaffComponent extends Component
{
    use RoleAndPermissionTrait;
    
    public $name;
    public $email;
    public $role;
    public $staff_id;

    public function mount($staff_id)
    {
        $this->authorizeRoleOrPermission('master|edit-staff');
        $staff = Admin::find($staff_id);
        $this->name = $staff->name;
        $this->staff_id = $staff->id;
        $this->email = $staff->email;
        $this->role = $staff->roles()->pluck('id')->toArray();
    }


    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,'.$this->staff_id,
            'role' => 'required|integer'
        ]);
    }


    public function editStaff()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,'.$this->staff_id,
            'role' => 'required|integer',
        ]);


        $staff = Admin::find($this->staff_id);
        $staff->name = $this->name;
        $staff->email = $this->email;
        $role = json_decode($this->role);
        $staff->assignRole($role);
        $staff->save();
        $role = Role::where('id', $role)->first();
        if ($role) {
            $permissions = $role->permissions;
            $staff->syncPermissions($permissions);
        }
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Staff Updated Successfully!']
        );
    }
    
    public function render()
    {
        $roles = Role::orderBy('created_at', 'DESC')->get();
        return view('livewire.admin.staff.admin-edit-staff-component',['roles'=>$roles])->layout('layouts.admin');
    }
}
