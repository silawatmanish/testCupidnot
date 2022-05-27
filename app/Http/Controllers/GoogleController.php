<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Hash;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
          
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
            // get user details from google..
            $user = Socialite::driver('google')->user();
           
            // find user in db..
            $findUser = User::where('google_id', $user->id)->first();
         
            if($findUser) {
                // login user if already registered.
                Auth::login($findUser);

                // after login redirect to home..
                return redirect()->intended('/home');
            } else {

                // send data to the register view..
                $data['first_name'] = $user->user['given_name'];
                $data['last_name'] = $user->user['family_name'];
                $data['google_id'] = $user->id;
                $data['email'] = $user->email;

                // load register view..
                return view('auth.register', $data);
            }
        
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

}