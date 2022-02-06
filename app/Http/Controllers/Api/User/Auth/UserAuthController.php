<?php

namespace App\Http\Controllers\Api\User\Auth;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Reffer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\Api\PasswordReset;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserAuthController extends Controller
{
    public function Register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|unique:users',
            'password_confirmation' => 'required',
            'password' => 'required|confirmed|min:8,max:20',
            'line1' => 'required|string',
            'line2' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'zip' => 'required|string',
            'phone' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }

        try {
            $user = new User();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->line1 = $request->line1;
            $user->line2 = $request->line2;
            $user->city = $request->city;
            $user->state = $request->state;
            $user->country = $request->country;
            $user->zip = $request->zip;
            $user->save();
            if ($request->reffer_code) {
                $reffer = Reffer::where('code', $request->reffer_code)->first();
                if ($reffer) {
                    $user = User::where('email', $reffer->from)->first();
                    if ($user) {
                        $user->deposit(10);
                        $reffer->delete();
                    }
                }
            }
            return response()->json([
                'message' => 'User registered sucessfully!',
                'data' => $user,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }


    public function Login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:5,max:30',
            'remember_me' => 'required|boolean'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        $token = $user->createToken('mobile', ['role:customer'])->plainTextToken;
        return response()->json([
            'message' => 'Logged in sucessfully!',
            'data' => $user,
            'token' => $token
        ])->header('token', $token);
    }

    public function getEmailForForgetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }

        try {
            $token = Str::random(6);
            DB::table('password_resets')->insert(
                ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
            );
            $message = [
                'token' => 'Your password reset token is ' . $token,
                'subject' => 'Password Reset Email Confirmation',
            ];
            Mail::to($request->email)->send(new PasswordReset($message));
            return response()->json([
                'message' => 'Password reset token is sent to ' . $request->email
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getTokenForForgetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'token' => 'required|string|exists:password_resets,token',
            'password' => 'required|string|min:6|max:20|confirmed',
            'password_confirmation' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }

        try {
            $updatePassword = DB::table('password_resets')
                ->where(['email' => $request->email, 'token' => $request->token])
                ->first();

            if (!$updatePassword)
                return back()->withInput()->with('error', 'Invalid token!');

            $user = User::where('email', $request->email)
                ->update(['password' => Hash::make($request->password)]);

            DB::table('password_resets')->where(['email' => $request->email])->delete();

            return response()->json([
                'message' => 'Password reset sucessfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getProfile()
    {
        try {
            $user = User::with('Order')->where('id', auth()->user()->id)->first();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Current logged user!',
            'data' => $user
        ]);
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . auth()->user()->id,
            'phone' => 'required|numeric',
            'line1' => 'required|string',
            'line2' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'zip' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }
        try {
            $user = User::findOrFail(auth()->user()->id);
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->line1 = $request->line1;
            $user->line2 = $request->line2;
            $user->city = $request->city;
            $user->state = $request->state;
            $user->country = $request->country;
            $user->zip = $request->zip;
            $user->save();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Profile updated sucessfully!',
            'data' => $user
        ]);
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed|different:current_password',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }
        try {
            $user = User::findOrFail(auth()->user()->id);
            if (!Hash::check($request->current_password, $user->password)) {
                return response()->json([
                    'message' => 'Password does not match with old one!!!'
                ], 403);
            }
            $user->password = Hash::make($request->password);
            $user->save();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Password updated sucessfully!',
            'data' => $user
        ]);
    }

    public function uploadProfileImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|mimes:png,jpg'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }
        try {
            $user = auth()->user();
            if ($user->image) {
                unlink(storage_path('app/public/user/' . $user->image));
            }
            $imageName = Carbon::now()->timestamp . '.' . $request->image->extension();
            $request->image->storeAS('public/user/', $imageName);
            $user->image = $imageName;
            $user->save();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Avatar updated sucessfully!',
            'data' => $user
        ]);
    }

    public function Logout(Request $request)
    {
        try {
            auth()->user()->currentAccessToken()->delete();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Logged out sucessfully!'
        ]);
    }
}
