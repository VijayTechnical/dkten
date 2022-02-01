<?php

namespace App\Http\Livewire\Admin\Vtype;

use App\Models\Vtype;
use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\RoleAndPermissionTrait;

class AdminVtypeComponent extends Component
{
    use WithPagination;
    use RoleAndPermissionTrait;

    public $searchTerm;
    public $paginate;

    public function mount()
    {
        $this->paginate = 10;
    }

    public function deleteVtype($id)
    {
        $this->authorizeRoleOrPermission('master|delete-vtype');
        $vtype = Vtype::find($id);
        if ($vtype->image) {
            unlink(storage_path('app/public/vtype/' . $vtype->image));
        }
        $vtype->delete();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'General Vendor Deleted Successfully!']
        );
    }

    public function render()
    {
        $vtypes = Vtype::query()
            ->where('id', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('name', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('slug', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('description', 'LIKE', "%{$this->searchTerm}%")
            ->orderBy('created_at', 'ASC')->paginate($this->paginate);
        return view('livewire.admin.vtype.admin-vtype-component',['vtypes'=>$vtypes])->layout('layouts.admin');
    }
}
