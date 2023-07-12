<?php

namespace App\Http\Controllers;

use App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;


class UserProfileController extends Controller
{
    public function index()
    {
        $userId = session('user_id');
        $user = User::find($userId);
        return view('user-profile.profile', compact('user'));
    }

    public function editdata()
    {
        $userId = session('user_id');
        $user = User::find($userId);
        return view('user-profile.edit', compact('user'));
    }

    public function updatedata(Request $request, string $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->birthday = $request->input('birthday');
        $user->phone = $request->input('phone');
        $user->location = $request->input('location');
        $user->age = now()->diffInYears($request->input('birthday'));
        $user->save();
        return redirect()->route('user-profile')->with('flash_message', 'User updated successfully.');
    }

    public function editpassword()
    {
        $userId = session('user_id');
        $user = User::find($userId);
        return view('user-profile.edit', compact('user'));
    }

    public function updatepassword(Request $request, string $id)
    {
        $request->validate([
            'password' => 'required|min:6',
            'repassword' => 'required|same:password',
        ]);

        $user = User::find($id);
        $user->password = Hash::make($request->input('password'));
        $user->update();
        return redirect()->route('user-profile')->with('flash_message', 'User updated successfully.');
    }


    public function editimg(string $id)
    {
        $user = User::find($id);
    }


    public function updateimg(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'birthday' => 'required|date',
            'email' => 'required|email',
            'phone' => 'required|regex:/^07\d{8}$/',
            'location' => 'required',
            'password' => 'required|min:6',
        ]);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->birthday = $request->input('birthday');
        $user->phone = $request->input('phone');
        $user->location = $request->input('location');
        $user->password = Hash::make($request->input('password'));
        $user->age = now()->diffInYears($request->input('birthday'));
        $user->update();
        return redirect()->route('teacher-dashboard.index')->with('flash_message', 'User updated successfully.');
    }
}
