<?php

namespace App\Http\Livewire\Vendor\Auth;

use Carbon\Carbon;
use Livewire\Component;
use App\Mail\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class VendorVerifyEmailComponent extends Component
{
    public $email;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'email' => 'required|email|exists:vendors,email'
        ]);
    }

    public function checkEmail()
    {
        $this->validate([
            'email' => 'required|email|exists:vendors,email'
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert(
            ['email' => $this->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        $message = [
        'url' => 'http://localhost:8000/vendor/reset-password/'.$token,
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
        return view('livewire.vendor.auth.vendor-verify-email-component')->layout('layouts.base');
    }
}
