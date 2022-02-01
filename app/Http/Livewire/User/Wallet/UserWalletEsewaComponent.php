<?php

namespace App\Http\Livewire\User\Wallet;

use SimpleXMLElement;
use Livewire\Component;
use App\Models\UserWallet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class UserWalletEsewaComponent extends Component
{
    public $thankyou;

    public function verify()
    {
        try {
            $wallet = UserWallet::where('id',request('oid'))->first();
            $amount = 100;
            $pid = $wallet->id;
            $response = Http::asForm()->post('https://uat.esewa.com.np/epay/transrec', [
                'amt' => $amount,
                'scd' => 'EPAYTEST',
                'rid' => request('refId'),
                'pid' => $pid,
            ]);
            $responseCode = strtolower(trim((new SimpleXMLElement($response->body()))->response_code));
            if ($responseCode == 'success') {
                Auth::guard('web')->user()->deposit($amount);
                $wallet->destroy($pid);
                return redirect()->route('user.load.wallet')->with('wallet_load_success_message','Wallet is loaded successfully!');
            }
            else{
                return redirect()->route('user.load.wallet')->with('wallet_load_error_message','Invalid request!!!');
            }
            
        } catch(\Exception $e) {
            return redirect()->route('user.load.wallet')->with('wallet_load_error_message','Invalid request!!!');
        }
    }

    
    public function render()
    {
        return view('livewire.user.wallet.user-wallet-esewa-component');
    }
}
