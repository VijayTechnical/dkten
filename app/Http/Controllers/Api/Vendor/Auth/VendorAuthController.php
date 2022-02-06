<?php

namespace App\Http\Controllers\Api\Vendor\Auth;

use Carbon\Carbon;
use App\Models\Vendor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\Api\PasswordReset;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class VendorAuthController extends Controller
{
    public function Login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:vendors,email',
            'password' => 'required|min:5,max:30',
            'remember_me' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }

        $vendor = Vendor::where('email', $request->email)->first();

        if (!$vendor || !Hash::check($request->password, $vendor->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        return response()->json([
            'data' => $vendor,
            'token' => $vendor->createToken('mobile', ['role:vendor'])->plainTextToken
        ]);
    }

    public function Register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vcategory_id' => 'required|integer|exists:vcategories,id',
            'vtype_id' => 'required|integer|exists:vtypes,id',
            'name' => 'required|string',
            'email' => 'required|string|unique:vendors',
            'display_name' => 'required|string|unique:vendors',
            'password' => 'required|confirmed|min:8,max:20',
            'line1' => 'required|string',
            'line2' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'zip' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }
        try {
            $vendor = new Vendor();
            $vendor->vcategory_id = $request->vcategory_id;
            $vendor->vtype_id = $request->vtype_id;
            $vendor->name = $request->name;
            $vendor->display_name = $request->display_name;
            $vendor->email = $request->email;
            $vendor->password = Hash::make($request->password);
            if ($request->company) {
                $vendor->company = $request->company;
            }
            $vendor->line1 = $request->line1;
            $vendor->line2 = $request->line2;
            $vendor->city = $request->city;
            $vendor->state = $request->state;
            $vendor->country = $request->country;
            $vendor->zip = $request->zip;
            $vendor->save();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }

        return response()->json([
            'message' => 'Profile registered sucessfully!',
            'data' => $vendor
        ]);
    }

    public function getEmailForForgetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:vendors,email'
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
            'email' => 'required|email|exists:vendors,email',
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

            $vendor = Vendor::where('email', $request->email)
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

    public function Profile(Request $request)
    {
        $vendor = $request->user();
        return response()->json($vendor);
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'display_name' => 'required',
            'email' => 'required|email|unique:vendors,email,' . auth()->user()->id,
            'line1' => 'required|string',
            'line2' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'zip' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }

        try {
            $vendor = Vendor::findOrFail(auth()->user()->id);
            $vendor->name = $request->name;
            $vendor->display_name = $request->display_name;
            $vendor->email = $request->email;
            if ($request->phone) {
                $vendor->phone = $request->phone;
            }
            if ($request->company) {
                $vendor->company = $request->company;
            }
            $vendor->line1 = $request->line1;
            $vendor->line2 = $request->line2;
            $vendor->city = $request->city;
            $vendor->state = $request->state;
            $vendor->country = $request->country;
            $vendor->zip = $request->zip;
            if ($request->about) {
                $vendor->about = $request->about;
            }
            if ($request->description) {
                $vendor->description = $request->description;
            }
            $vendor->save();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }

        return response()->json([
            'message' => 'Profile updated sucessfully!',
            'data' => $vendor
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
            if (Hash::check($request->current_password, auth()->user()->password)) {
                $vendor = vendor::findOrFail(auth()->user()->id);
                $vendor->password = Hash::make($request->password);
                $vendor->save();
                return response()->json([
                    'message' => 'Password updated sucessfully!',
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }

        return response()->json([
            'message' => 'Password does not match with old one!!!',
        ], 404);
    }

    public function updateSeoSetting(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'keywords' => 'required|string',
            'seo_title' => 'required|string',
            'seo_description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }

        try {
            $vendor = vendor::findOrFail(auth()->user()->id);
            $vendor->keywords = $request->keywords;
            $vendor->seo_title = $request->seo_title;
            $vendor->seo_description = $request->seo_description;
            $vendor->save();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Seo setting updated sucessfully!',
            'data' => $vendor
        ]);
    }

    public function updateSocialSetting(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'facebook' => 'nullable',
            'instagram' => 'nullable',
            'twitter' => 'nullable',
            'google' => 'nullable',
            'youtube' => 'nullable',
            'whatsapp' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }

        try {
            $vendor = vendor::findOrFail(auth()->user()->id);
            $vendor->facebook = $request->facebook;
            $vendor->instagram = $request->instagram;
            $vendor->twitter = $request->twitter;
            $vendor->google = $request->google;
            $vendor->youtube = $request->youtube;
            $vendor->whatsapp = $request->whatsapp;
            $vendor->save();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Social setting updated sucessfully!',
            'data' => $vendor
        ]);
    }

    public function updateImageSetting(Request $request)
    {
        if ($request->new_logo) {
            $validator = Validator::make($request->all(), [
                'new_logo' => 'required|mimes:png,jpg,svg'
            ]);
            if ($validator->fails()) {
                return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
            }
        }
        if ($request->new_cover_image) {
            $validator = Validator::make($request->all(), [
                'new_cover_image' => 'required|mimes:png,jpg,svg'
            ]);
            if ($validator->fails()) {
                return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
            }
        }

        try {
            $vendor = vendor::findOrFail(auth()->user()->id);
            if ($request->new_logo) {
                if ($vendor->logo) {
                    unlink(storage_path('app/public/vendor/logo/' . $vendor->logo));
                }
                $logoName = Carbon::now()->timestamp . '.' . $request->new_logo->extension();
                $request->new_logo->storeAS('public/vendor/logo', $logoName);
                $vendor->logo = $logoName;
            } else {
                $vendor->logo = $vendor->logo;
            }
            if ($request->new_cover_image) {
                if ($vendor->cover_image) {
                    unlink(storage_path('app/public/vendor/cover_image/' . $vendor->cover_image));
                }
                $cover_imageName = Carbon::now()->timestamp . '.' . $request->new_cover_image->extension();
                $request->new_cover_image->storeAS('public/vendor/cover_image', $cover_imageName);
                $vendor->cover_image = $cover_imageName;
            } else {
                $vendor->cover_image = $vendor->cover_image;
            }
            $vendor->save();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Image setting updated sucessfully!',
            'data' => $vendor
        ]);
    }

    public function updateMerchant(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'merchant_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }
        try {
            $vendor = vendor::findOrFail(auth()->user()->id);
            $vendor->merchant_code = $request->merchant_id;
            $vendor->save();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Merchant id updated sucessfully!',
            'data' => $vendor
        ]);
    }
}
