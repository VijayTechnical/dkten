<?php

namespace App\Http\Livewire\User\Wallet;

use App\Classes\Otp;
use Livewire\Component;
use App\Models\UserWallet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserProceedWalletLoadComponent extends Component
{
    public $otp;
    public $amount;
    public $method;
    public $wallet_id;

    public function proceedToLoad()
    {
        $validator = Validator::make($this->all(), [
            'otp' => 'required|digits:6|integer',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }
        if (Otp::isValid(Auth::guard('web')->user()->id, $this->otp) == true) {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'Otp is validated sucessfully!']
            );
            $userWallet = UserWallet::where('otp', $this->otp)->first();
            if ($userWallet) {
                $this->wallet_id = $userWallet->id;
                $this->method = $userWallet->method;
                $this->amount = $userWallet->amount;
                if($this->method)
                {
                    if ($this->method == 'esewa') {
                        $this->dispatchBrowserEvent('submitEsewa');
                    } else {
                        $this->dispatchBrowserEvent('showKhalti');
                    }
                }
            } else {
                return redirect()->route('user.load.wallet')->with('wallet_load_error_message', 'Invalid request!!!');
            }
        }
        else{
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => 'Invalid otp!!!']
            );
        }
    }

    public function render()
    {
        return view('livewire.user.wallet.user-proceed-wallet-load-component')->layout('layouts.base');
    }
}
