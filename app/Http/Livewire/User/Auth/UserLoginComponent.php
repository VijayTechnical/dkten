<?php

namespace App\Http\Livewire\User\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserLoginComponent extends Component
{
    public $email;
    public $password;
    public $remember;

    public function Login()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:5,max:30'
        ], [
            'email.exists' => 'This email does not exists.'
        ]);

        $creds = $this->only('email', 'password');
        if (Auth::attempt($creds)) {
            return redirect()->route('user.dashboard');
        } else {
            return redirect()->back()->with('fail', 'Incorrect Credentials!!!');
        }
    }
    public function render()
    {
        return view('livewire.user.auth.user-login-component')->layout('layouts.base');
    }
}
