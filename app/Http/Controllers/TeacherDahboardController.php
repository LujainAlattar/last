<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Booking;
use App\Models\Classes;
use App\Models\Payment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherDahboardController extends Controller
{
    public function index()
    {
        return view('teacher-profile.teacher-dashboard.index');
    }


    public function showstudent()
    {
        // Get the logged-in teacher's user ID
        $teacherId = Auth::id();

        // Retrieve the students where the teacher ID matches the user_id in the users table
        $students = User::whereHas('classes', function ($query) use ($teacherId) {
            $query->where('user_id', $teacherId);
        })->where('role_id', 2)->get();

        return view('teacher-profile.teacher-dashboard.users.index', compact('students'));
    }

    public function showstudentdata(string $id)
    {
        $student = User::find($id);
        return view('teacher-profile.teacher-dashboard.users.show')->with('student', $student);
    }


    public function assignments()
    {
        return view('teacher-profile.teacher-dashboard.index');
    }



    public function notes()
    {
        return view('teacher-profile.teacher-dashboard.index');
    }


    // appointments create edit delete show
    public function createappointment()
    {
        return view('teacher-profile.teacher-dashboard.booking.create');
    }


    public function appointment(Request $request)
    {
        $validatedData = $request->validate([
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        $userId = Auth::id();
        $class = Classes::where('user_id', $userId)->first();

        if ($class) {
            Booking::create([
                'class_id' => $class->id,
                'start_time' => $validatedData['start_time'],
                'end_time' => $validatedData['end_time'],
                'status' => 0,
            ]);

            return redirect()->route('teacher-showappointment-dashboard')->with('success', 'Appointment created successfully!');
        } else {
            return redirect()->back()->with('error', 'Class not found.');
        }
    }




    public function updateappointment($id)
    {
        $appointment = Booking::find($id);

        if (!$appointment) {
            return redirect()->route('teacher-showappointment-dashboard')->with('error', 'Appointment not found.');
        }

        return view('teacher-profile.teacher-dashboard.booking.edit', compact('appointment'));
    }


    public function editappointment(Request $request, $id)
    {
        $validatedData = $request->validate([
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        $userId = Auth::id();
        $class = Classes::where('user_id', $userId)->first();

        if ($class) {
            $booking = Booking::find($id);

            if (!$booking) {
                return redirect()->back()->with('error', 'Appointment not found.');
            }

            // Update the appointment data
            $booking->class_id = $class->id;
            $booking->start_time = $validatedData['start_time'];
            $booking->end_time = $validatedData['end_time'];
            $booking->status = 0;
            $booking->save();

            return redirect()->route('teacher-showappointment-dashboard')->with('success', 'Appointment updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Class not found.');
        }
    }


    public function deleteappointment($id)
    {
        $userId = Auth::id();
        $class = Classes::where('user_id', $userId)->first();

        if ($class) {
            $booking = Booking::find($id);

            if (!$booking) {
                return redirect()->back()->with('error', 'Appointment not found.');
            }

            // Check if the appointment belongs to the user's class
            if ($booking->class_id !== $class->id) {
                return redirect()->back()->with('error', 'Unauthorized action.');
            }

            // Delete the appointment
            $booking->delete();

            return redirect()->route('teacher-showappointment-dashboard')->with('success', 'Appointment deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Class not found.');
        }
    }

    // show the booked appointment
    public function showuserappointment($id)
    {
        $appointment = Booking::find($id);

        if (!$appointment) {
            return redirect()->back()->with('error', 'Appointment not found.');
        }

        // Fetch related user, class, subject, and payment
        $user = User::find($appointment->user_id);
        $class = Classes::find($appointment->class_id);
        $subject = $class->subject;
        $payment = Payment::where('book_id', $appointment->id)->first();

        return view('teacher-profile.teacher-dashboard.booking.show', compact('user', 'class', 'subject', 'appointment', 'payment'));
    }


    // the index of the appointments
    public function showappointment()
    {
        $userId = Auth::user()->id;
        $class = Classes::where('user_id', $userId)->first();
        $classId = $class->id;
        $appointments = Booking::where('class_id', $classId)->get();

        return view('teacher-profile.teacher-dashboard.booking.index', compact('appointments'));
    }
    public function showreviews()
    {
        return view('teacher-profile.teacher-dashboard.index');
    }
}
