<?php

namespace App\Http\Livewire\Admin\Auth;

use App\Models\Admin;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminLoginComponent extends Component
{
    public $email;
    public $password;
    public $remember_me;

    public function Login()
    {
        $this->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:5,max:30'
        ], [
            'email.exists' => 'This email does not exists.'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $this->email, 'password' => $this->password])) {
            $admin = Admin::where('email', $this->email)->firstOrFail();
            if ($this->remember_me === true) {
                $admin->createToken('remember_token')->plainTextToken;
            }
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'Logged In Successfully!']
            );
            return redirect('/admin/dashboard');
        } else {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => 'Invalid Credentials!!!']
            );
        }
    }

    public function render()
    {
        return view('livewire.admin.auth.admin-login-component')->layout('layouts.auth');
    }
}
