<?php

namespace App\Http\Livewire\Admin\Components\Modal;

use App\Models\User;
use App\Models\Vendor;
use Livewire\Component;

class AdminVendorProfileComponent extends Component
{
    public $vendor;
    public $customer;
    protected $listeners = ['showVendor' => 'loadVendor','showCustomer' => 'loadCustomer'];

    public function loadModel($id)
    {
        $this->vendor = Vendor::find($id);
        $this->dispatchBrowserEvent('showVendor');
    }

    public function loadCustomer($id)
    {
        $this->customer = User::find($id);
        $this->dispatchBrowserEvent('showCustomer');
    }


    public function render()
    {
        return view('livewire.admin.components.modal.admin-vendor-profile-component');
    }
}
