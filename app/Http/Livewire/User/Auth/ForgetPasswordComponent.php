<?php

namespace App\Http\Livewire\User\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ForgetPasswordComponent extends Component
{

    public $email;
    public $token;
    public $password;
    public $password_confirmation;

    public function mount($token)
    {
        $this->token = $token;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);
    }

    public function updatePassword()
    {

        $this->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        $updatePassword = DB::table('password_resets')
            ->where(['email' => $this->email, 'token' => $this->token])
            ->first();

        if (!$updatePassword)
            return back()->withInput()->with('error', 'Invalid token!');

        $user = User::where('email', $this->email)
            ->update(['password' => Hash::make($this->password)]);

        DB::table('password_resets')->where(['email' => $this->email])->delete();

        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Password was reset sucessfully!']
        );

        return redirect()->route('user.login');
    }


    public function render()
    {
        return view('livewire.user.auth.forget-password-component')->layout('layouts.base');
    }
}
