<?php

namespace App\Http\Livewire\Admin\Staff;

use App\Models\Admin;
use App\Traits\RoleAndPermissionTrait;
use Livewire\Component;
use Livewire\WithPagination;

class AdminStaffComponent extends Component
{
    use WithPagination;
    use RoleAndPermissionTrait;

    public $searchTerm;
    public $paginate;


    public function mount()
    {
        $this->paginate = 10;
    }


    public function deleteStaff($id)
    {
       
        $this->authorizeRoleOrPermission('master|delete-staff');
        $admin = Admin::find($id);
        if ($admin->image) {
            unlink(storage_path('app/public/admin/' . $admin->image));
        }
        $admin->delete();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Staff Deleted Successfully!']
        );
    }


    public function render()
    {
        $staffs = Admin::query()
        ->where('id', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('name', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('email', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('image', 'LIKE', "%{$this->searchTerm}%")
        ->orderBy('created_at', 'ASC')->paginate($this->paginate);
        return view('livewire.admin.staff.admin-staff-component',['staffs'=>$staffs])->layout('layouts.admin');
    }
}
