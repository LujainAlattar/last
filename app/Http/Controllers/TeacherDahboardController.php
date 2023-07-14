<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherDahboardController extends Controller
{
    public function index(){
        return view('teacher-profile.teacher-dashboard.index');
    }
}
