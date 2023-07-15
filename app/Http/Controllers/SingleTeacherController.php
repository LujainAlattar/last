<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\Classes;
use App\Models\Payment;
use App\Models\Rating;

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

        $ratings = Rating::where('class_id', $classId)->get();

        return view('home.teacher', compact('user', 'class', 'appointments','ratings'));
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

        // Find the class using the class ID
        $class = Classes::find($selectedClassId);

        // Calculate the total price (amount) based on the class price
        $amount = $class->price;

        // Create a new payment record in the 'payments' table
        $payment = new Payment();
        $payment->book_id = $request->selectedAppointmentId;
        $payment->price = $amount;
        $payment->save();

        if (isset($_SERVER['HTTP_REFERER'])) {
            $previousUrl = $_SERVER['HTTP_REFERER'];
            if (strpos($previousUrl, route('teacher.show', $request->selectedClassId)) !== false) {

                $request->session()->forget(['selectedAppointmentId', 'selectedClassId']);
            }
        }

        // Redirect the user to a success page or back to the teacher details page with a success message
        return redirect()->route('teacher.show', ['id' => $request->selectedClassId])->with('success', 'Payment successful!');
    }



    

    public function reviewstore(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'rating' => 'required|integer',
            'comment' => 'required|string',
            'class_id' => 'required|exists:classes,id',
        ]);

        $review = new Rating();
        $review->class_id = $request->class_id;
        $review->name = $request->name;
        $review->email = $request->email;
        $review->feedback = $request->comment;
        $review->star_rating = $request->rating;

        // Check if the user is authenticated
        if (auth()->check()) {
            // If authenticated, use the user's image
            $review->user_image = auth()->user()->img;
        } else {
            // If guest, use the default profile image
            $review->user_image = 'defualt_profile.jpg'; // Change 'default_profile.jpg' to the correct default image filename
        }

        $review->save();

        return redirect()->back()->with('flash_msg_success', 'Your review has been submitted Successfully.');
    }

}
