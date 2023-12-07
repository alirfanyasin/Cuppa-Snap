<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handelGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $findUser = User::where('email', $googleUser->email)->first();

            if ($findUser) {
                Auth::login($findUser);
                return redirect()->intended('dashboard');
            } else {
                $user = User::updateOrCreate(
                    ['email' => $googleUser->email],
                    [
                        'name' => $googleUser->name,
                        'email' => $googleUser->email,
                        'google_id' => $googleUser->id,
                        'password' => Hash::make('Y60ku5mYH5sMVpSggYi0g5nVHk6LNw'),
                        // 'google_token' => $googleUser->token,
                        // 'google_refresh_token' => $googleUser->refreshToken,
                    ]
                );
                $user->assignRole('pelanggan');
                Auth::login($user);
                return redirect()->intended('dashboard');
            }
        } catch (Exception $error) {
            dd($error->getMessage());
        }
    }
}
