<?php

namespace App\Http\Controllers\Api\User\Wallet;

use App\Classes\Otp;
use App\Mail\WalletLoad;
use App\Models\UserWallet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserWalletController extends Controller
{
    public function verifyEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|integer|numeric',
            'method' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }
        try {
            $otp = Otp::generate(auth()->user()->id, $request->amount, $request->method);
            if (!$otp['status']) {
                $responseMessage = 'Please wait ' . $otp['resend_time'] . ' seconds for new otp request.';
                return response()->json([
                    'message' => $responseMessage
                ], 403);
            }
            $responseMessage = 'Dear user, Your OTP Code has been sent to ' . auth()->user()->email;
            $message = 'Dear user, Your OTP Code is ' . $otp['otp'];
            Mail::to(auth()->user()->email)->send(new WalletLoad($message));
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => $responseMessage
        ]);
    }

    public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'otp' => 'required|digits:6|integer',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }

        try {
            $userWallet = UserWallet::with('User')->where('otp', $request->otp)->firstOrFail();
            if (!Otp::isValid(auth()->user()->id, $request->otp) == true || !$userWallet) {
                return response()->json([
                    'message' => 'Invalid request!!!'
                ], 403);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Otp validated sucessfully!',
            'data' => $userWallet
        ]);
    }
}
