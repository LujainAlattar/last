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
        $this->validate($request, [
            'your_name' => 'required|string|email',
            'pass' => 'required|string',
        ]);

        $remember = $request->has('remember-me');


        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            $user = Auth::user();
            if ($user->role_id == 1) {
                // Redirect to the dashboard for users with role_id = 1
                Session::put('role', 'admin');
                return redirect()->intended('/dashboard');
            } elseif ($user->role_id == 2) {
                // Redirect to the hello page for users with role_id = 2
                // session::put('user_img', $user->img);
                Session::put('user_id', $user->id);
                Session::put('role', 'user');
                return redirect()->intended('/home-page');
            } elseif ($user->role_id == 3) {
                // Handle other role IDs as needed
                session::put('user_img', $user->img);
                Session::put('user_id', $user->id);
                Session::put('role', 'teacher');
                return redirect()->intended('/Lessor');
            }
        } else {
            // Authentication failed
            return redirect()->back()->withErrors(['email' => 'Invalid email or password.']);
        }
    }
}
