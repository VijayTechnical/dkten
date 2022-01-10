<?php

namespace App\Http\Livewire\Admin\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminLoginComponent extends Component
{
    public $email;
    public $password;
    public $remember;

    public function Login()
    {
        $this->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:5,max:30'
        ], [
            'email.exists' => 'This email does not exists.'
        ]);

        if (Auth::guard('admin')->attempt(['email'=>$this->email,'password'=>$this->password])) {
            return redirect('/admin/dashboard');
        } else {
            $this->dispatchBrowserEvent('swal:model', [
                'statuscode' => 'error',
                'title' => 'Error',
                'text' => 'Invalid credentials',
            ]);
        }
    }

    public function render()
    {
        return view('livewire.admin.auth.admin-login-component')->layout('layouts.auth');
    }
}
