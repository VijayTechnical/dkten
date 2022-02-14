<?php

namespace App\Http\Livewire\Admin\Area;

use App\Models\Area;
use Livewire\Component;

class AdminAreaComponent extends Component
{
    public $searchTerm;
    public $paginate;

    public function mount()
    {
        $this->paginate = 10;
    }

    public function deleteArea($id)
    {
        $area = Area::findOrFail($id);
        $area->delete();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'area Deleted Successfully!']
        );
    }

    public function render()
    {
        $areas = Area::where('name', 'LIKE', '%' . $this->searchTerm . '%')->latest()->paginate($this->paginate);
        return view('livewire.admin.area.admin-area-component', ['areas' => $areas])->layout('layouts.admin');
    }
}
