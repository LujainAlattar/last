<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class StudentController extends Controller
{
    public function index($id)
    {
        $user = User::findOrFail($id); // Find the user with the given ID

        return view('user-profile.profile', compact('user'));
    }

    public function edit(string $id)
    {
        $user = User::find($id);
        return view('user-profile.edit')->with('user', $user);
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'birthday' => 'required|date',
            'email' => 'required|email',
            'phone' => 'required|regex:/^07\d{8}$/',
            'location' => 'required',
        ]);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->birthday = $request->input('birthday');
        $user->phone = $request->input('phone');
        $user->location = $request->input('location');
        $user->age = now()->diffInYears($request->input('birthday')); // Calculate the age

        $user->update();

        return redirect()->route('user-profile')->with('flash_message', 'User updated successfully.');
    }

    public function updatepass(Request $request, string $id)
    {
        $request->validate([
            'password' => 'required|min:6',
            'repassword' => 'required|same:password',
        ]);

        $user = User::find($id);
        $user->password = Hash::make($request->input('password'));
        $user->update();

        return redirect()->route('user-profile')->with('flash_message', 'User added successfully.');
    }
}
