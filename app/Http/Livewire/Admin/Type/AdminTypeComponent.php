<?php

namespace App\Http\Livewire\Admin\Type;

use App\Models\Type;
use Livewire\Component;
use Livewire\WithPagination;

class AdminTypeComponent extends Component
{
    use WithPagination;

    public $paginate;
    public $searchTerm;

    public function mount()
    {
        $this->paginate = 10;
    }

    public function statusUpdate($id)
    {
        $type = Type::findOrFail($id);
        $type->status = !$type->status;
        $type->save();
    }

    public function deleteType($id)
    {
        $type = type::find($id);
        if ($type->image) {
            unlink(storage_path('app/public/type/' . $type->image));
        }
        $type->delete();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Type Deleted Successfully!']);
    }

    public function render()
    {
        $types = Type::query()
        ->where('id', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('name', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('slug', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('status', 'LIKE', "%{$this->searchTerm}%")
        ->orderBy('created_at', 'ASC')
        ->with('SubType')->paginate($this->paginate);
        return view('livewire.admin.type.admin-type-component',['types'=>$types])->layout('layouts.admin');
    }
}
