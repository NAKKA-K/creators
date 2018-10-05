<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;

class SocialAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function redirectToProvider(string $provider){
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback(string $provider){
        $user = Socialite::driver($provider)->user();
        dd($user);
    }
}
