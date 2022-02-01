<?php

namespace App\Http\Livewire\Admin\Staff;

use App\Models\Admin;
use App\Traits\RoleAndPermissionTrait;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminAddStaffComponent extends Component
{
    use RoleAndPermissionTrait;

    public $name;
    public $email;
    public $password;
    public $utype;
    public $role;
    public $password_confirmation;

    public function mount()
    {
        $this->authorizeRoleOrPermission('master|add-staff');
    }


    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:8|max:20|confirmed',
            'role' => 'required|integer'
        ]);
    }


    public function addStaff()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:8|max:20|confirmed',
            'role' => 'required|integer',
        ]);


        $staff = new Admin();
        $staff->name = $this->name;
        $staff->email = $this->email;
        $staff->password = Hash::make($this->password);
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
            ['type' => 'success',  'message' => 'Staff Added Successfully!']
        );
    }

    public function render()
    {
        $roles = Role::orderBy('created_at', 'DESC')->get();
        return view('livewire.admin.staff.admin-add-staff-component', ['roles' => $roles])->layout('layouts.admin');
    }
}
