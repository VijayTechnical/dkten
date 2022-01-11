<?php

namespace App\Http\Livewire\Admin\Mall;

use App\Models\Mall;
use Livewire\Component;
use Livewire\WithPagination;

class AdminMallComponent extends Component
{
    use WithPagination;

    public $searchTerm;
    public $paginate;

    public function mount()
    {
        $this->paginate = 10;
    }

    public function deleteMall($id)
    {
        $mall = Mall::find($id);
        if ($mall->image) {
            unlink(storage_path('app/public/mall/' . $mall->image));
        }
        $mall->delete();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Mall Deleted Successfully!']
        );
    }

    public function render()
    {
        $malls = Mall::query()
            ->where('id', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('name', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('slug', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('description', 'LIKE', "%{$this->searchTerm}%")
            ->orderBy('created_at', 'ASC')->paginate($this->paginate);
        return view('livewire.admin.mall.admin-mall-component',['malls'=>$malls])->layout('layouts.admin');
    }
}
