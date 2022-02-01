<?php

namespace App\Http\Livewire\Admin\Faq;

use App\Models\Faq;
use App\Traits\RoleAndPermissionTrait;
use Livewire\Component;
use Livewire\WithPagination;

class AdminFaqComponent extends Component
{
    use WithPagination;
    use RoleAndPermissionTrait;

    public $paginate;
    public $searchTerm;

    public function mount()
    {
        $this->paginate = 10;
    }

    public function deleteFaq($id)
    {
        $this->authorizeRoleOrPermission('master|delete-faq');
        $faq = Faq::find($id);
        $faq->delete();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Faq Deleted Successfully!']
        );
    }

    public function render()
    {
        $faqs = Faq::query()
            ->where('id', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('question', 'LIKE', "%{$this->searchTerm}%")
            ->orderBy('created_at', 'ASC')->paginate($this->paginate);
        return view('livewire.admin.faq.admin-faq-component',['faqs'=>$faqs])->layout('layouts.admin');
    }
}
