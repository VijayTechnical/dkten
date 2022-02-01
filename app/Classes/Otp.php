<?php
namespace App\Classes;

use Carbon\Carbon;
use App\Models\User;
use App\Models\UserWallet;

class Otp{

    public static function generate($user_id,$amount,$method)
    {
        try {
            $otp_resend_seconds = 60;
            $otp_valid_time = 60;

            $otp =  mt_rand(100000, 999999);
            $status = true;
            $resend_time = null;

            //#START##Check and update OTP Resend table
            $userOtp = UserWallet::where('id', '=', $user_id)->first();
            if ($userOtp) {
                //otp resend diff
                $diff = Carbon::now()->diffInSeconds($userOtp->updated_at);

                if ($diff < $otp_resend_seconds) {
                    $resend_time = $otp_resend_seconds - $diff;
                    $status = false;
                } else {
                    $userOtp->otp = ( $otp_valid_time < $diff ) ? $otp : $userOtp->otp;
                    $userOtp->retry = $userOtp->retry + 1;
                    $userOtp->updated_at = date('Y-m-d H:i:s');
                    $userOtp->save();
                }
            } else {
                $userOtp = UserWallet::create(['user_id' => $user_id, 'otp' => $otp,'amount'=>$amount,'method'=>$method]);
            }
        } catch(\Exception $e) {
            // throw new \Exception('Otp not generated due to system issue. Please contact administrator.');
            throw new \Exception($e->getMessage());
        }

        return [
            'status' => $status,
            'otp' => $userOtp->otp,
            'resend_time' => $resend_time,
        ];
    }

    public static function isValid($user_id, $otp)
    {
        $otp =  UserWallet::where(['user_id' => $user_id, 'otp' => $otp])->whereDate('created_at', date('Y-m-d'))->count();
        if ($otp > 0) {
            return true;
        }

        return false;
    }

}