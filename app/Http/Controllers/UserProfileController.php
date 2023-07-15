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
        $user = User::with('payments', 'bookings.appointments', 'class.teacher')->find(auth()->id());

        // Get all the data you need
        $userPayments = $user->payments;
        $userBookings = $user->bookings;
        $userAppointments = $user->appointments;
        $userClass = $user->class;
        $teacherUser = $userClass->teacher; // Retrieve the teacher's user associated with the class


        // Pass the data to the view
        return view('user-profile.profile', compact('user', 'userPayments', 'userBookings', 'userAppointments', 'userClass', 'teacherUser'));
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

        return view('user-profile.edit', compact('user'));
    }

    public function updateimg(Request $request, string $id)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the uploaded image file
        ]);

        $user = User::find($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/uploads/images', $imageName);
            $user->img = $imageName;
        }

        $user->save();

        return redirect()->route('user-profile')->with('flash_message', 'User updated successfully.');
    }
}
