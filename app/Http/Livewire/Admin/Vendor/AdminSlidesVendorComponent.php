<?php

namespace App\Http\Livewire\Admin\Vendor;

use App\Models\Vslider;
use App\Traits\RoleAndPermissionTrait;
use Livewire\Component;
use Livewire\WithPagination;

class AdminSlidesVendorComponent extends Component
{
    use RoleAndPermissionTrait;
    use WithPagination;

    public $paginate;
    public $searchTerm;
    public $field;

    public function mount()
    {
        $this->paginate = 10;
    }

    public function changeStatus($id)
    {
        $this->authorizeRoleOrPermission('master|change-vslider-status');

        $vslide = Vslider::find($id);
        $vslide->status = !$vslide->status;
        $vslide->save();
    }

    public function deleteVslide($id)
    {
        $this->authorizeRoleOrPermission('master|delete-vslider');
        
        $vslide = Vslider::find($id);
        $vslide->delete();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Vendor Slider Deleted Successfully!']
        );
    }

    public function render()
    {
        $vslides = Vslider::whereHas('Vendor', function ($query) {
            $query->where('name', 'like', "%{$this->searchTerm}%")
            ->orWhere('display_name', 'like', "%{$this->searchTerm}%");
        })->orderBy('created_at', 'DESC')->paginate($this->paginate);
        return view('livewire.admin.vendor.admin-slides-vendor-component',['vslides'=>$vslides])->layout('layouts.admin');
    }
}
