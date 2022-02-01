<?php

namespace App\Http\Livewire\Admin\Faq;

use App\Models\Faq;
use App\Traits\RoleAndPermissionTrait;
use Livewire\Component;

class AdminAddFaqComponent extends Component
{
    use RoleAndPermissionTrait;
    
    public $question;
    public $answer;

    public function mount()
    {
        $this->authorizeRoleOrPermission('master|add-faq');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'question' => 'required|string',
            'answer' => 'required'
        ]);
    }

    public function addFaq()
    {
        $this->validate([
            'question' => 'required|string',
            'answer' => 'required'
        ]);

        $faq = new Faq();
        $faq->question = $this->question;
        $faq->answer = $this->answer;
        $faq->save();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Faq Created Successfully!']
        );
    }
    public function render()
    {
        return view('livewire.admin.faq.admin-add-faq-component')->layout('layouts.admin');
    }
}
