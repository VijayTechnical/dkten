<?php

namespace App\Http\Livewire\Admin\Eservice;

use Livewire\Component;
use App\Models\Eservice;
use Livewire\WithPagination;

class AdminEserviceComponent extends Component
{
    use WithPagination;

    public $searchTerm;
    public $paginate;

    public function mount()
    {
        $this->paginate = 10;
    }

    public function deleteEservice($id)
    {
        $eservice = Eservice::find($id);
        if ($eservice->image) {
            unlink(storage_path('app/public/eservice/' . $eservice->image));
        }
        $eservice->delete();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Eservice Deleted Successfully!']
        );
    }

    public function render()
    {
        $eservices = Eservice::query()
            ->where('id', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('name', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('slug', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('description', 'LIKE', "%{$this->searchTerm}%")
            ->orderBy('created_at', 'ASC')->paginate($this->paginate);
        return view('livewire.admin.eservice.admin-eservice-component',['eservices'=>$eservices])->layout('layouts.admin');
    }
}
