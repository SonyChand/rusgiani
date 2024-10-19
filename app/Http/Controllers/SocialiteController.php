<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function revoke()
    {
        try {
            Socialite::driver('google')->revoke();
            // (Opsional) Log out user dari aplikasi
            Auth::logout();
            // Redirect ke halaman yang sesuai, misalnya halaman login
            return redirect('/login')->with('success', 'Akses Google dicabut.');
        } catch (\Exception $e) {
            // Handle error, misalnya:
            return redirect()->back()->withErrors(['error' => 'Gagal mencabut akses Google.']);
        }
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();

            $existingUser = User::where('email', $user->getEmail())->first();

            if ($existingUser) {
                Auth::login($existingUser);
            } else {
                $newUser = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'google_id' => $user->getId(),
                    // tambahkan field lain sesuai kebutuhan, misal:
                    // 'password' => encrypt('password_default')
                ]);

                Auth::login($newUser);
            }

            return redirect()->intended('/dashboard');
        } catch (\Exception $e) {
            // Handle error, misalnya redirect ke halaman login dengan pesan error
            return redirect('/login')->withErrors(['error' => 'Gagal login dengan Google.']);
        }
    }
}
