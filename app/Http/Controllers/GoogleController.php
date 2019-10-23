<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $userData = Socialite::driver('google')->user();

        // dd($userData->getEmail(), $userData->getName());
        $finduser = User::where('email', $userData->getEmail())->exists();

        //dd($finduser);
        if (!$finduser) {
            User::insert([
                'name' => $userData->getName(),
                'email' => $userData->getEmail(),
                'user_role' => 2,
                'password' => Hash::make('abcd@1234'),
                'created_at' => Carbon::now(),
            ]);
        }
        if (Auth::attempt(['email' => $userData->getEmail(), 'password' => 'abcd@1234'])) {
            return redirect()->route('customer.home');
        }
    }

}
