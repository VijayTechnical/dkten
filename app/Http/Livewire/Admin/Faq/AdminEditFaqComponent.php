<?php

namespace App\Http\Livewire\Admin\Faq;

use App\Models\Faq;
use App\Traits\RoleAndPermissionTrait;
use Livewire\Component;

class AdminEditFaqComponent extends Component
{
    use RoleAndPermissionTrait;
    
    public $question;
    public $answer;
    public $faq_id;

    public function mount($faq_id)
    {
        $this->authorizeRoleOrPermission('master|edit-eservice');
        $faq = Faq::find($faq_id);
        $this->faq_id = $faq->id;
        $this->question = $faq->question;
        $this->answer = $faq->answer;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'question' => 'required|string',
            'answer' => 'required'
        ]);
    }

    public function editFaq()
    {
        $this->validate([
            'question' => 'required|string',
            'answer' => 'required'
        ]);

        $faq = Faq::find($this->faq_id);
        $faq->question = $this->question;
        $faq->answer = $this->answer;
        $faq->save();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Faq Updated Successfully!']
        );
    }


    public function render()
    {
        return view('livewire.admin.faq.admin-edit-faq-component')->layout('layouts.admin');
    }
}
