<?php

namespace App\Http\Livewire\User\Auth;

use App\Mail\Web\PasswordReset;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ForgetPasswordEmailComponent extends Component
{

    public $email;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'email' => 'required|email|exists:users,email'
        ]);
    }

    public function checkEmail()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert(
            ['email' => $this->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        $message = [
        'url' => 'http://localhost:8000/user/reset-password/'.$token,
        'subject' => 'Reset Password Notification',
        ];

        Mail::to($this->email)->send(new PasswordReset($message));

        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Email is send sucessfully to your email account!']
        );
    }
    public function render()
    {
        return view('livewire.user.auth.forget-password-email-component')->layout('layouts.base');
    }
}
