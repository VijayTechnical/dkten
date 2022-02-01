<?php

namespace App\Http\Livewire\Admin\Vendor;

use App\Models\Vendor;
use App\Traits\RoleAndPermissionTrait;
use Livewire\Component;
use Livewire\WithPagination;

class AdminVendorComponent extends Component
{
    use RoleAndPermissionTrait;
    use WithPagination;

    public $paginate;
    public $searchTerm;

    public function mount()
    {
        $this->paginate = 10;
    }

    public function editVendor($id)
    {
        $this->authorizeRoleOrPermission('master|edit-vendor-status');
        $vendor = Vendor::find($id);
        $vendor->status = !$vendor->status;
        $vendor->save();
    }

    public function deletevendor($id)
    {
        $this->authorizeRoleOrPermission('master|delete-vendor');
        $vendor = Vendor::find($id);
        if ($vendor->logo) {
            unlink(storage_path('app/public/vendor/logo' . $vendor->logo));
        }
        if ($vendor->cover_image) {
            unlink(storage_path('app/public/vendor/cover_image' . $vendor->cover_image));
        }
        $vendor->delete();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Vendor Deleted Successfully!']
        );
    }

    public function render()
    {
        $vendors = Vendor::query()
            ->where('id', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('name', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('display_name', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('email', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('line1', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('line2', 'LIKE', "%{$this->searchTerm}%")
            ->orderBy('created_at', 'ASC')->paginate($this->paginate);
        return view('livewire.admin.vendor.admin-vendor-component',['vendors'=>$vendors])->layout('layouts.admin');
    }
}
