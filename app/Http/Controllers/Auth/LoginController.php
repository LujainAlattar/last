<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // Authentication passed
            $user = Auth::user();
            if ($user->role_id == 1) {
                // Redirect to the dashboard for users with role_id = 1
                Session::put('role', 'admin');
                Session::put('role_id', '1');
                return redirect()->route('admin');
            } elseif ($user->role_id == 2) {
                // Redirect to the hello page for users with role_id = 2
                Session::put('user_id', $user->id);
                Session::put('role_id', '2');
                Session::put('role', 'user');
                return redirect()->route('home');
            } elseif ($user->role_id == 3) {
                // Handle other role IDs as needed
                Session::put('user_id', $user->id);
                Session::put('role', 'teacher');
                Session::put('role_id', '3');
                return redirect()->route('home');
            }
        }

        // Authentication failed
        return redirect()->back()->withErrors(['email' => 'Invalid email or password.']);
    }
}
