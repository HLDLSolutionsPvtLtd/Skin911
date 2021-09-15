<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserAdminController extends Controller
{

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            if (auth()->user()->is_admin == 1) {
                return redirect()->route('admin.dashboard');
            }else{
                Auth::logout();

                $request->session()->invalidate();

                $request->session()->regenerateToken();

                return back()->withErrors([
                    'email' => 'The provided credentials do not match our records.',
                ]);
            }

            return redirect()->intended('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}