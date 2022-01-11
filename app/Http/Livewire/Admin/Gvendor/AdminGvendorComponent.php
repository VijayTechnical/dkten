<?php

namespace App\Http\Livewire\Admin\Gvendor;

use App\Models\Gvendor;
use Livewire\Component;
use Livewire\WithPagination;

class AdminGvendorComponent extends Component
{
    use WithPagination;

    public $searchTerm;
    public $paginate;

    public function mount()
    {
        $this->paginate = 10;
    }

    public function deleteGvendor($id)
    {
        $gvendor = Gvendor::find($id);
        if ($gvendor->image) {
            unlink(storage_path('app/public/gvendor/' . $gvendor->image));
        }
        $gvendor->delete();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'General Vendor Deleted Successfully!']
        );
    }

    public function render()
    {
        $gvendors = gvendor::query()
            ->where('id', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('name', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('slug', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('description', 'LIKE', "%{$this->searchTerm}%")
            ->orderBy('created_at', 'ASC')->paginate($this->paginate);
        return view('livewire.admin.gvendor.admin-gvendor-component',['gvendors'=>$gvendors])->layout('layouts.admin');
    }
}
