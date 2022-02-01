<?php

namespace App\Http\Livewire\Admin\Contact;

use App\Models\Contact;
use App\Traits\RoleAndPermissionTrait;
use Livewire\Component;
use Livewire\WithPagination;

class AdminContactComponent extends Component
{
    use WithPagination;
    use RoleAndPermissionTrait;
    public $paginate;

    public function mount()
    {
        $this->paginate = 10;
    }

    public function deleteContact($id)
    {
        $this->authorizeRoleOrPermission('master|delete-contact');
        $contact = Contact::find($id);
        $contact->delete();
        $this->emitTo('admin.components.admin-header-component', 'refreshComponent');
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Contact Deleted Successfully!']);
    }

    public function render()
    {
        $contacts = Contact::orderBy('created_at','DESC')->paginate($this->paginate);
        return view('livewire.admin.contact.admin-contact-component',['contacts'=>$contacts])->layout('layouts.admin');
    }
}
