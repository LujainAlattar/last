<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\Classes;

use Illuminate\Support\Facades\Auth;

class SingleTeacherController extends Controller
{
    public function index(string $id)
    {
        $user = User::findOrFail($id);

        $class = Classes::where('user_id', $user->id)->first();

        if (!$class) {
            return redirect()->back()->with('error', 'Class not found.');
        }

        $classId = $class->id;
        $appointments = Booking::where('class_id', $classId)
            ->orderBy('start_time', 'asc') // Order by start_time in ascending order
            ->get();


        return view('home.teacher', compact('user', 'class', 'appointments'));
    }

    public function select($id)
    {
        // Retrieve the selected appointment ID and class ID from the local storage
        $selectedAppointmentId = request()->get('selectedAppointmentId');
        $selectedClassId = request()->get('selectedClassId');

        // Find the class using the class ID
        $class = Classes::find($selectedClassId);

        if (!$class) {
            return redirect()->route('teacher.show', ['id' => $id])->with('error', 'Class not found.');
        }

        return redirect()->route('payment', compact('class', 'selectedAppointmentId', 'selectedClassId'));
    }


    public function processPayment(Request $request, $selectedClassId)
    {
        // Validate the payment form data
        $request->validate([
            'name' => 'required|string',
            'cardNumber' => 'required|string',
            'expiryDate' => 'required|string',
            'cvv' => 'required|string',
            'amount' => 'required|numeric',
            'selectedAppointmentId' => 'required|integer',
            'selectedClassId' => 'required|integer',
        ]);

        // Save the payment details to your database or perform the necessary payment processing logic
        // For example, you can create a Payment model and save the data in the database

        // Clear the data from local storage after processing the payment
        // This ensures that the user's selection won't persist if they come back to the page later
        if (isset($_SERVER['HTTP_REFERER'])) {
            $previousUrl = $_SERVER['HTTP_REFERER'];
            if (strpos($previousUrl, route('teacher.show', $request->selectedClassId)) !== false) {
                // If the previous page was the teacher details page, clear the local storage data
                // This avoids re-selecting the same appointment if the user goes back and forth between pages
                $request->session()->forget(['selectedAppointmentId', 'selectedClassId']);
            }
        }

        // Redirect the user to a success page or back to the teacher details page with a success message
        return redirect()->route('teacher.show', ['id' => $selectedClassId])->with('success', 'Payment successful!');
    }
}
