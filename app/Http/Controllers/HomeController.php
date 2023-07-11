<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Classes;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::where('role_id', 3)->get();
        $class = Classes::all();
        if (session()->has('user_id')) {


            $userId = session('user_id');
            $student = User::find($userId);
            $userImg = $student ? $student->img : 'default_profile.jpg';

            return view('home.index', compact('users', 'userImg', 'userId', 'class'));

        } else {
            return view('home.index', compact('users','class'));
        }
    }
}
