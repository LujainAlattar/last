<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Classes;
use App\Models\Payment;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;



class AdminHomeController extends Controller
{
    public function index()
    {

        $students = User::where('role_id', 2)->count();
        $teachers = User::where('role_id', 3)->count();
        $payments = Payment::sum('price');
        $classprice = Classes::avg('price');
        $subjects = Subject::count();
        $classestoken = Booking::where('status', 1)->count();

        return view('admin.index', compact(
            'students',
            'teachers',
            'payments',
            'classprice',
            'subjects',
            'classestoken'
        ));
    }
}
