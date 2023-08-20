<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Classes;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::where('role_id', 3)
            ->with(['classes.subject']) // Eager load classes and subject relationships
            ->paginate(9);

        return view('home.index', compact('users'));
    }
}
