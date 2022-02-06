<?php

namespace App\Http\Controllers\Api\User\Reffer;

use App\Models\Reffer;
use App\Mail\SendRefferCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserRefferController extends Controller
{
    public function sendReffer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:reffers,to',
            'code' => 'required|string|unique:reffers,code',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }
        try {
            $reffer = new Reffer();
            $reffer->from = auth()->user()->email;
            $reffer->to = $request->email;
            $reffer->code  = $request->code;
            $reffer->save();
            $message = [
                'subject' => 'Reffer code from ' . auth()->user()->email,
                'message' => 'Your reffer code is ' . $request->code,
                'url' => '' . config('app.url') . ':8000/user/register'
            ];
            Mail::to($request->email)->send(new SendRefferCode($message));
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Reffer code send to that email!',
            'data' => $reffer
        ]);
    }
}
