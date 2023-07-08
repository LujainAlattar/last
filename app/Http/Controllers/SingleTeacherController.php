<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SingleTeacherController extends Controller
{
    public function index(string $id)
    {
        $user = User::find($id);
        return view('admin.teachers.show')->with('user', $user);
    }
}
