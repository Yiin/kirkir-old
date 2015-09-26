<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\User;
use App\Profile;

Route::get('/', function()
{
    $data = array();

    if (Auth::check()) {
        $data = Auth::user();
    }
    return View::make('welcome', array('data'=>$data));
});

Route::get('login/fb', function() {
    return Socialize::driver('facebook')->redirect();
});

Route::get('login/fb/callback', function() {
    $code = Input::get('code');
    if (strlen($code) == 0) return Redirect::to('/')->with('message', 'There was an error communicating with Facebook');

    $facebook = new Facebook(array(
    	'appId' => '493749207461031',
        'secret' => '4951f7daf6489efa4d8996d942718618'
    ));
    $uid = $facebook->getUser();

    if ($uid == 0) return Redirect::to('/')->with('message', 'There was an error');

    $me = Socialize::driver('facebook')->user();

    $user = new User;

    $profile = Profile::whereUid($uid)->first();
    if (empty($profile)) {
        $user->name = $me['first_name'] . ' ' . $me['last_name'];
        $user->email = $me['email'];
        $user->photo = 'https://graph.facebook.com/v2.4/' . $me['id'] . '/picture?type=normal';

        $user->save();

        $profile = new Profile();
        $profile->uid = $uid;
        $profile->username = $me['email'];
        $profile = $user->profiles()->save($profile);
    }

    $profile->access_token = $facebook->getAccessToken();
    $profile->save();

    $user = $profile->user;

    Auth::login($user);

    return Redirect::to('/')->with('message', 'Logged in with Facebook');
});

Route::get('logout', function() {
    Auth::logout();
    return Redirect::to('/');
});