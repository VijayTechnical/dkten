<?php

namespace App\Http\Livewire\Admin\Components;

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

    public function render()
    {
        return view('livewire.admin.components.admin-header-component');
    }
}
