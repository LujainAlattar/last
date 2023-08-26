<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact; // Import the Contact model

class ContactController extends Controller
{

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Contact::create($validatedData);

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
