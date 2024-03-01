<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    //
    public function redirect($provider){
        return Socialite::driver($provider)->redirect();

    }
    public function callback($provider){
        $SocialUser = Socialite::driver($provider)->user();
        $defaultRole = getSetting('new_user_default_role');
        $user = User::updateOrCreate([
            'provider_id' => $SocialUser->id,
            'provider' => $provider,
        ], [
            'name' => $SocialUser->name,
            'username' => $SocialUser->nickname,
            'email' => $SocialUser->email,
            'provider_token' => $SocialUser->token,
        ]);
        $user->assignRole($defaultRole);
        Auth::login($user);


        return redirect('/dashboard');
    }
}
