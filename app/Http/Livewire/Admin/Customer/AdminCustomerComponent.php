<?php

namespace App\Http\Livewire\Admin\Customer;

use App\Models\User;
use App\Traits\RoleAndPermissionTrait;
use Livewire\Component;

class AdminCustomerComponent extends Component
{
    use RoleAndPermissionTrait;
    public $searchTerm;
    public $paginate;

    public function mount()
    {
        $this->paginate = 10;
    }

    public function deleteCustomer($id)
    {
        $this->authorizeRoleOrPermission('master|delete-customer');
        $customer = User::find($id);
        if ($customer->image) {
            unlink(storage_path('app/public/customer/image' . $customer->image));
        }
        $customer->delete();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Customer Deleted Successfully!']
        );
    }
    
    public function render()
    {
        $customers = User::query()
        ->where('id', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('first_name', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('last_name', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('email', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('line1', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('line2', 'LIKE', "%{$this->searchTerm}%")
        ->orderBy('created_at', 'ASC')->paginate($this->paginate);
        return view('livewire.admin.customer.admin-customer-component',['customers'=>$customers])->layout('layouts.admin');
    }
}
