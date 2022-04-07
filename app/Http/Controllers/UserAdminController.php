<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserAdminController extends Controller
{

    public function search(Request $request)
    {
        $users = User::where('name', 'like', "%$request->key%")->get();
        return Inertia::render('Admin/Users', ['users' => $users]);
    }

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

 
    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/admin');
    }
}