<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register_user');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'pass' => 'required|min:6',
            're_pass' => 'required|same:pass',
            'agree-term' => 'accepted',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->pass);
        $user->role_id = 2;

        $user->save();

        Auth::login($user);
        session()->put('user_id', $user->id);
        session()->put('role', 'user');


        $message = 'Registered successfully!';
        return redirect()->route('home')->with('success', $message);
    }
}
