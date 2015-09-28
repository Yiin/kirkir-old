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

Route::get('menu', function () {
    if(Auth::check()) {
        return view('menu');
    }
    else {
        return Redirect::to('/');
    }
});

Route::get('about', function () {
    return view('about');
});

Route::get('team', function () {
    return view('team');
});

Route::get('contact', function () {
    return view('contact');
});

Route::get('user', function ()
{
    return view('user');
});

Route::post('remove-pet', function() {
    $pet = App\Pet::find(Input::get('pet_id'));
    //App\Pet::where('user_id', Auth::user()->id)
    //    ->where('id', Input::get('pet_id'))->get();

    if($pet) {
        $pet->delete();
        return ['success' => true];
    }
    else {
        return ['success' => false];
    }
});

Route::post('add-pet', function() {
    $pet = new App\Pet;

    $pet->name = Input::get('name', 'unknown');
    $pet->type_id = Input::get('type', 1);
    $pet->breed_id = Input::get('breed', 1);
    $pet->gender = Input::get('gender', 0);
    $pet->country = Input::get('country', 'lt');
    $pet->years = Input::get('years', 2015);

    $pet->user_id = Auth::user()->id;

    $pet->save();

    return $pet;
});

Route::post('search', function() {
    $retdata = [];

    foreach(App\Pet::all() as $pet) {
        if(Input::has('country')) {
            if($pet->country != Input::get('country')) {
                continue;
            }
        }
        if(Input::has('type')) {
            if($pet->type_id != Input::get('type')) {
                continue;
            }
        }
        if(Input::has('breed')) {
            if($pet->breed_id != Input::get('breed')) {
                continue;
            }
        }
        if(Input::has('gender')) {
            if($pet->gender != Input::get('gender')) {
                continue;
            }
        }
        array_push($retdata, [
            'country' => $pet->country,
            'name' => $pet->name,
            'type' => $pet->type->name,
            'breed' => $pet->breed->name,
            'gender' => $pet->gender
        ]);
    }

    return $retdata;
});

Route::get('login/gmail', function () {
    return Socialize::driver('google')->redirect();
});

Route::get('login/gmail/callback', function () {
    $code = Input::get('code');
    if (strlen($code) == 0) return Redirect::to('/')->with('message', 'There was an error communicating with GMail');

    $me = Socialize::driver('google')->user();

    $user = new User;

    $profile = Profile::whereUsername($me->email)->first();
    if (empty($profile)) {
        $user->name = $me->name;
        $user->email = $me->email;
        $user->photo = $me->avatar;

        $user->save();

        $profile = new Profile();
        $profile->username = $me->email;
        $profile = $user->profiles()->save($profile);
    }

    $profile->access_token = $me->token;
    $profile->save();

    $user = $profile->user;

    Auth::login($user);

    return Redirect::to('/')->with('message', 'Logged in with GMail');
});

Route::get('login/fb', function() {
    return Socialize::driver('facebook')->redirect();
});

Route::get('login/fb/callback', function() {
    $code = Input::get('code');
    if (strlen($code) == 0) return Redirect::to('/')->with('message', 'There was an error communicating with Facebook');

    $me = Socialize::driver('facebook')->user();

    //dd($me->token);

    $user = new User;

    $profile = Profile::whereUsername($me->email)->first();
    if (empty($profile)) {
        $user->name = $me->first_name . ' ' . $me->last_name;
        $user->email = $me->email;
        $user->photo = 'https://graph.facebook.com/v2.4/' . $me->id . '/picture?type=normal';

        $user->save();

        $profile = new Profile();
        $profile->username = $me->email;
        $profile = $user->profiles()->save($profile);
    }

    $profile->access_token = $me->token;
    $profile->save();

    $user = $profile->user;

    Auth::login($user);

    return Redirect::to('/')->with('message', 'Logged in with Facebook');
});

Route::get('logout', function() {
    Auth::logout();
    return Redirect::to('/');
});