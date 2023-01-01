<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            if(Auth::user()->status != 'Active') {

                Session()->flash('status', 'failed');
                Session()->flash('message', 'Your account is not activate yet');
                return redirect('/login');
            }
            
            $request->session()->regenerate();
            if(Auth::user()->role_id == 1) {
                return redirect('dashboard');
            }

            if(Auth::user()->role_id == 2) {
                return redirect('profile');
            }
            
        }
        Session()->flash('status', 'failed');
        Session()->flash('message', 'login invalid');
        return redirect('/login');
        
    }
}
