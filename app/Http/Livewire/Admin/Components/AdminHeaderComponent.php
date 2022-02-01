<?php

namespace App\Http\Livewire\Admin\Components;

use App\Models\Logo;
use App\Models\Contact;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AdminHeaderComponent extends Component
{
    public function Logout()
    {
        Auth::guard('admin')->logout();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Logged Out Successfully!']
        );
        return redirect('/admin/login');
    }

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function render()
    {
        $logo = Logo::find(1);
        $contacts = Contact::orderBy('created_at', 'DESC')->get();
        return view('livewire.admin.components.admin-header-component',['logo'=>$logo,'contacts'=>$contacts]);
    }
}
