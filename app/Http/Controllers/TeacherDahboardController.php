<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Booking;
use App\Models\Classes;
use App\Models\Note;
use App\Models\Payment;
use App\Models\Rating;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TeacherDahboardController extends Controller
{
    public function index()
    {
        $teacherId = Auth::id();

        $students = User::whereHas('bookings.class', function ($query) use ($teacherId) {
            $query->where('user_id', $teacherId);
        })->where('role_id', 2)->count();

        $payments = Payment::whereHas('booking.class', function ($query) use ($teacherId) {
            $query->where('user_id', $teacherId);
        })->sum('price');

        $classprice = Classes::where('user_id', $teacherId)->value('price');

        return view('teacher-profile.teacher-dashboard.index',compact('students', 'payments', 'classprice'));
    }


    public function showstudent()
    {
        // Get the logged-in teacher's user ID
        $teacherId = Auth::id();

        // Retrieve the students where the teacher ID matches the user_id in the users table
        $students = User::whereHas('bookings.class', function ($query) use ($teacherId) {
            $query->where('user_id', $teacherId);
        })->where('role_id', 2)->get();

        return view('teacher-profile.teacher-dashboard.users.index', compact('students'));
    }

    public function showstudentdata(string $id)
    {
        $student = User::find($id);
        return view('teacher-profile.teacher-dashboard.users.show')->with('student', $student);
    }

    public function studenthistory($id)
    {
        $studentId = $id;
        $previousNotes = Note::where('user_id', $studentId)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('teacher-profile.teacher-dashboard.users.notes', compact('studentId', 'previousNotes'));
    }


    public function assignments(Request $request)
    {
        // Validate the form data
        $request->validate([
            'file' => 'required',
        ]);

        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();

        $file->move(public_path('storage/assignments'), $fileName);

        $filePath = 'assignments/' . $fileName;

        $studentId = $request->input('student_id');

        $note = new Note();
        $note->user_id = $studentId;
        $note->teacher_id = Auth::id();
        $note->assignment = $filePath;
        $note->save();

        return redirect()->route('teacher-student-dashboard')->with('success', 'Assignment added successfully.');
    }



    public function notes(Request $request)
    {
        $request->validate([
            'note' => 'required',
        ]);
        $studentId = $request->input('student_id');
        $note = new Note();
        $note->user_id = $studentId;
        $note->teacher_id = Auth::id();
        $note->note = $request->input('note');
        $note->save();

        return redirect()->route('teacher-student-dashboard')->with('success', 'Assignment added successfully.');
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
            // Calculate the hours (end time minus start time)
            $startTime = Carbon::parse($validatedData['start_time']);
            $endTime = Carbon::parse($validatedData['end_time']);
            $hoursDiff = $endTime->diffInHours($startTime);

            Booking::create([
                'class_id' => $class->id,
                'start_time' => $validatedData['start_time'],
                'end_time' => $validatedData['end_time'],
                'status' => 0,
                'hours' => $hoursDiff, // Set the calculated 'hours' attribute
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
            // Calculate the hours (end time minus start time) and set the 'hours' attribute
            $startTime = Carbon::parse($booking->start_time);
            $endTime = Carbon::parse($booking->end_time);
            $hoursDiff = $endTime->diffInHours($startTime);
            $booking->hours = $hoursDiff;
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
        $userId = Auth::id();

        // Retrieve the user's classes
        $userClasses = Classes::where('user_id', $userId)->get();

        // Retrieve the reviews for those classes with pagination
        $reviews = Rating::whereIn('class_id', $userClasses->pluck('id'))->paginate(10);

        return view('teacher-profile.teacher-dashboard.reviews.index', compact('reviews'));
    }
}
