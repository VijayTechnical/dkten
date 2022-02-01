<?php

namespace App\Http\Livewire\Admin\Vendor;

use App\Models\Vendor;
use Livewire\Component;
use App\Models\Vcommision;
use App\Traits\RoleAndPermissionTrait;

class AdminCommisionVendorComponent extends Component
{
    use RoleAndPermissionTrait;

    public $vendor_id;
    public $commision;

    public function mount()
    {
        $this->authorizeRoleOrPermission('master|add-vendor-commision');
        $this->commision = 0.00;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'vendor_id' => 'required|integer',
            'commision' => 'required|integer'
        ]);
    }

    public function addCommision()
    {
        $this->validate([
            'vendor_id' => 'required|integer',
            'commision' => 'required|integer'
        ]);

        $commision = Vcommision::find($this->vendor_id);
        if(!$commision)
        {
            $commision = new Vcommision();
        }
        $commision->vendor_id = $this->vendor_id;
        $commision->commision = $this->commision;
        $commision->save();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Vendor Commision Added Successfully!']
        );
    }

    public function render()
    {
        $vendors = Vendor::orderBy('created_at', 'DESC')->where('status', true)->get();
        return view('livewire.admin.vendor.admin-commision-vendor-component', ['vendors' => $vendors])->layout('layouts.admin');
    }
}
