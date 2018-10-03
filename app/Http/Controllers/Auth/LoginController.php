<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Abraham\TwitterOAuth\TwitterOAuth;
use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/events';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function twitter(){
        $twitter = new TwitterOAuth(
            config('twitter.consumer_key'),
            config('twitter.consumer_secret')
        );

        // get request_token
        $token = $twitter->oauth('oauth/request_token', [
            'oauth_callback' => config('twitter.callback_url')
        ]);

        // authenticate token
        session([
            'oauth_token' =>$token['oauth_token'],
            'oauth_token_secret' => $token['oauth_token_secret'],
        ]);

        // go to authenticate page
        $url = $twitter->url('oauth/authenticate', [
            'oauth_token' => $token['oauth_token']
        ]);

        return redirect($url);
    }

    public function twitterCallback(Request $request){
        $oauth_token = session('oauth_token');
        $oauth_token_secret = session('oauth_token_secret');

        if($request->has('oauth_token') && $oauth_token !== $request->oauth_token){
            return redirect()->route('login');
        }

        $twitter = new TwitterOAuth(
            $oauth_token,
            $oauth_token_secret
        );

        // get access_token from request_token
        $token = $twitter->oauth('oauth/access_token', [
            'oauth_verifier' => $request->oauth_verifier,
            'oauth_token' => $request->oauth_token,
        ]);

        $twitter_user = new TwitterOAuth(
            config('twitter.consumer_key'),
            config('twitter.consumer_secret'),
            $token['oauth_token'],
            $token['oauth_token_secret']
        );

        $twitter_user_info = $twitter_user->get('account/verify_credentials');
        dd($twitter_user_info);
    }
}
