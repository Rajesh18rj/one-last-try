<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TherapistLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('therapist.auth.therapist-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Add role condition
        $credentials['role'] = 'therapist';

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->route('therapist.dashboard');
        }

        return back()->withErrors([
            'email' => 'This account is not registered as a therapist.',
        ])->onlyInput('email');
    }
}
