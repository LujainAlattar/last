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
        $classes = Classes::with('subject')->whereIn('user_id', $users->pluck('id'))->get();

        return view('home.index', compact('users', 'classes'));
    }

}
