<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class FaceBookController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();
        if (!User::where('email', $user->getEmail())->exists()) {
            User::insert([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'user_role' => 2,
                'password' => Hash::make('abcd@1234'),
                'created_at' => Carbon::now(),
            ]);
        }
        if (Auth::attempt(['email' => $user->getEmail(), 'password' => 'abcd@1234'])) {
            return redirect()->route('customer.home');
        }
    }
}
