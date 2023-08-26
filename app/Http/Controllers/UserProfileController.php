<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\Classes;
use App\Models\Payment;
use App\Models\Subject;
use App\Models\Note;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;


class UserProfileController extends Controller
{
    public function index()
    {
        $authId = Auth::id();
        $user = User::find($authId);
        $appointments = Booking::where('user_id', $authId)->get();

        $appointmentsData = [];

        foreach ($appointments as $appointment) {
            $class = Classes::with('user')->find($appointment->class_id);
            $subject = Subject::find($class->subject_id);
            $payment = Payment::where('book_id', $appointment->id)->first();
            $teacher = User::find($class->user_id);

            $appointmentsData[] = [
                'class' => $class,
                'subject' => $subject,
                'appointment' => $appointment,
                'payment' => $payment,
                'teacher' => $teacher,
            ];
        }

        return view('user-profile.profile', compact('appointmentsData','user'));
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
        $user->save();

        return redirect()->route('user-profile')->with('flash_message', 'User updated successfully.');
    }

    public function showapp($id)
    {
        $authId = Auth::id();

        $appointment = Booking::where('id', $id)->first();

        if (!$appointment) {
            return redirect()->back()->with('error', 'Appointment not found.');
        }

        $class = Classes::with('user')->find($appointment->class_id);
        $subject = Subject::find($class->subject_id);
        $payment = Payment::where('book_id', $appointment->id)->first();

        $user = User::find($authId); // Authenticated user
        $teacher = User::find($class->user_id); // User associated with the class

        return view('user-profile.showapp', compact('class', 'subject', 'appointment', 'payment', 'user', 'teacher'));
    }

    public function deleteapp($id)
    {
        $appointment = Booking::findOrFail($id);

        if ($appointment->payment) {
            $appointment->payment->delete();
        }

        $appointment->update(['user_id' => null]);


        return redirect()->route('user-profile', ['success' => 'Appointment deleted successfully']);
    }

    public function shownotes(){
        $studentId = Auth::id();
        $previousNotes = Note::where('user_id', $studentId)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user-profile.notes', compact('studentId', 'previousNotes'));
    }
}
