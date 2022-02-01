<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class UserSocialLoginController extends Controller
{
   
    /**
     * Redirect the user to the social authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from social.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request, $provider)
    {
        
        $user = Socialite::driver($provider)->user();

        $auth_user = $this->findOrCreateUser($user, $provider);

        Auth::guard('web')->login($auth_user, true);
    }

    /**
     * get or create user.
     *
     * @return \Illuminate\Http\Response
     */
    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('email', $user->email)->first();

        if ($authUser) {
            return $authUser;
        }

        $name = explode(' ', $user->name);

        return User::create([
            'first_name' => $name[0],
            'last_name' => isset($name[1]) ? $name[1] : '',
            'email' => $user->email,
            'provider' => $provider,
            'provider_id' => $user->id,
            'image' => $user->avatar
        ]);
    }
}
