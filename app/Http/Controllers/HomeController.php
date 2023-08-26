<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Classes;
use App\Models\Rating;
use App\Models\Subject;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::where('role_id', 3)
            ->with(['classes.subject']) // Eager load classes and subject relationships
            ->paginate(12);

        $subjects = Subject::all();

        $minprice = DB::table('classes')->min('price');
        $maxprice = DB::table('classes')->max('price');

        $randomReview = Rating::where('star_rating', '>', 3)
        ->inRandomOrder()
        ->first();


        return view('home.index', compact('users', 'subjects', 'minprice','maxprice', 'randomReview'));
    }


}
