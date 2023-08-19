<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Classes;
use App\Models\Subject;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;


class TeacherProfileController extends Controller
{
    public function index()
    {
        $userId = session('user_id');
        $user = User::find($userId);
        $class = Classes::where('user_id', $userId)->first();
        $subject = $class ? $class->subject : null; // Check if $class is null before accessing subject

        return view('teacher-profile.profile', compact('user', 'class', 'subject'));
    }
    public function editdata()
    {
        $userId = session('user_id');
        $user = User::find($userId);
        $class = Classes::where('user_id', $userId)->first();
        $subjects = Subject::all(); // Fetch all subjects
        return view('teacher-profile.edit')->with('user', $user)->with('class', $class)->with('subjects', $subjects);
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

    $class = Classes::where('user_id', $id)->first();

    if (!$class) {
        $class = new Classes();
        $class->user_id = $id;
    }

    $class->subject_id = $request->input('subject_id');
    $class->price = $request->input('price');
    $class->save();

    return redirect()->route('teacher-user-profile')->with('flash_message', 'User updated successfully.');
}


    public function editpassword()
    {
        $userId = session('user_id');
        $user = User::find($userId);
        return view('teacher-profile.edit', compact('user'));
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
        return redirect()->route('teacher-profile')->with('flash_message', 'User updated successfully.');
    }


    public function updateimg(Request $request, string $id)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the uploaded image file
        ]);

        $user = User::find($id);

        if ($request->hasFile('image')) {
            $destination_path = 'uploads/images' . $user->user_img;
            if (File::exists($destination_path)) {
                File::delete($destination_path);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('storage/uploads/images', $filename);
            $user->img = $filename;
        }
        $user->update();

        return redirect()->route('teacher-user-profile')->with('flash_message', 'User updated successfully.');
    }
}
