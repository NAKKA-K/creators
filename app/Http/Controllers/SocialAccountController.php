<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\SocialAccount;
use App\User;
use Socialite;

class SocialAccountController extends Controller
{
    public function redirectToProvider(string $provider){
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback(string $provider){
        $user = Socialite::driver($provider)->user();

        dd($user);

        //Auth::login(getOrCreateSocialUser($user, $provider), true);
        //return redirect()->route('events.index')
    }

    // create social_account & create user & return associated user
    private function getOrCreateSocialUser($socialUser, $provider){
        $account = SocialAccount::firstOrCreate([
            'provider_id' => $socialUser->getId(),
            'provider' => $provider,
        ]);

        if(empty($account->user)){
            $user = User::create([
                'name' => getDisplayName($socialUser, $provider), // Get nickname or name
                'email' => $socialUser->getEmail(),
            ]);
            $account->user()->associate($user);
        }
        $account->access_token = $socialUser->token;
        $account->save();

        return $account->user;
    }

    private function getDisplayName($socialUser, $provider) {
        switch($provider){
        case 'github':
            return $socialUser->getNickname();
        case 'twitter':
        case 'facebook':
            return $socialUser->getName();
        }
    }
}
