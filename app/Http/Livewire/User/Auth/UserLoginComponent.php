<?php

namespace App\Http\Livewire\User\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class UserLoginComponent extends Component
{

    public $email;
    public $password;
    public $remember_me;

    public function Login()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:5,max:30'
        ], [
            'email.exists' => 'This email does not exists.'
        ]);

        if (Auth::guard('web')->attempt(['email' => $this->email, 'password' => $this->password])) {
            $user = User::where('email', $this->email)->firstOrFail();
            if ($this->remember_me === true) {
                $user->createToken('remember_token')->plainTextToken;
            }
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'Logged In Successfully!']
            );
            return redirect('/user/dashboard');
        } else {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => 'Invalid credentials!!!']
            );
        }
    }

    public function render()
    {
        return view('livewire.user.auth.user-login-component')->layout('layouts.base');
    }
}
