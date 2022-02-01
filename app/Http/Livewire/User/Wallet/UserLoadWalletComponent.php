<?php

namespace App\Http\Livewire\User\Wallet;

use App\Classes\Otp;
use Livewire\Component;
use App\Mail\WalletLoad;
use App\Models\UserWallet;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserLoadWalletComponent extends Component
{
    public $amount;
    public $method;
    public $otp;
    public $user_wallet_id;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'amount' => 'required|integer|numeric',
            'method' => 'required|string'
        ]);
    }

    public function loadWallet()
    {
        $this->validate([
            'amount' => 'required|integer|numeric',
            'method' => 'required|string'
        ]);
        try {
            $otp = Otp::generate(Auth::guard('web')->user()->id, $this->amount, $this->method);
            if ($otp['status']) {
                $responseMessage = 'Dear user, Your OTP Code has been sent to ' . Auth::guard('web')->user()->email;
                $message = 'Dear user, Your OTP Code is ' . $otp['otp'];
                Mail::to(Auth::guard('web')->user()->email)->send(new WalletLoad($message));
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'success',  'message' => $responseMessage]
                );
                return redirect()->route('user.load.wallet.proceed');
            } else {
                $responseMessage = 'Please wait ' . $otp['resend_time'] . ' seconds for new otp request.';
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'error',  'message' => $responseMessage]
                );
            }
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => $e->getMessage()]
            );
        }
    }
    public function render()
    {
        return view('livewire.user.wallet.user-load-wallet-component')->layout('layouts.base');
    }
}
