<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;


class RegisterTeacherController extends Controller
{
    public function showRegistrationTeacherForm()
    {
        return view('auth.register_teacher');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'pass' => 'required|min:6',
            're_pass' => 'required|same:pass',
            'agree-term' => 'accepted',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = 3;

        // Set a default value for the profile image
        $user->img = 'defualt_profile.jpg';

        $user->save();

        Auth::login($user);
        session()->put('user_id',$user->id);
        session()->put('role','teacher');

        return redirect('/Lessor')->with('success', 'Registered successfully');
    }
}
