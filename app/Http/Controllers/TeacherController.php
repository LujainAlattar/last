<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subject;
use App\Models\Classes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role_id', 3)->get();
        return view('admin.teachers.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $subjects = Subject::all(); // Retrieve all subjects from the database
        return view('admin.teachers.create', compact('subjects'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'birthday' => 'required|date',
            'email' => 'required|email',
            'phone' => 'required|regex:/^07\d{8}$/',
            'location' => 'required',
            'password' => 'required|min:6',
            'repassword' => 'required|same:password',
            'subject' => 'required|exists:subjects,id',
            'price' => 'required',
        ]);


        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->birthday = $request->input('birthday');
        $user->phone = $request->input('phone');
        $user->location = $request->input('location');
        $user->password = Hash::make($request->input('password'));
        $user->role_id = 3;
        $user->age = now()->diffInYears($request->input('birthday')); // Calculate the age
        $user->save();

        $class = new Classes();
        $class->subject_id = $request->input('subject');
        $class->user_id = $user->id;
        $class->price = $request->input('price');
        $class->save();

        return redirect()->route('teacher-dashboard.index')->with('flash_message', 'User added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        $class = Classes::where('user_id', $id)->first();
        $subject = $class->subject; // Access the associated subject
        return view('admin.teachers.show', compact('user', 'class', 'subject'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $class = Classes::where('user_id', $id)->first();
        $subjects = Subject::all(); // Fetch all subjects
        return view('admin.teachers.edit')->with('user', $user)->with('class', $class)->with('subjects', $subjects);
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'birthday' => 'required|date',
            'email' => 'required|email',
            'phone' => 'required|regex:/^07\d{8}$/',
            'location' => 'required',
            'password' => 'required|min:6',
        ]);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->birthday = $request->input('birthday');
        $user->phone = $request->input('phone');
        $user->location = $request->input('location');
        $user->password = Hash::make($request->input('password'));
        $user->age = now()->diffInYears($request->input('birthday'));
        $user->save();

        $class = Classes::where('user_id', $id)->first();
        $class->subject_id = $request->input('subject_id');
        $class->price = $request->input('price');
        $class->save();

        return redirect()->route('teacher-dashboard.index')->with('flash_message', 'User updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('teacher-dashboard.index')->with('flash_message', 'User deleted successfully.');
    }


    public function search(Request $request)
    {
        $output = "";
        $searchTerm = $request->input('search');
        $users = User::where('role_id', 3)
            ->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('email', 'like', '%' . $searchTerm . '%');
            })
            ->get();


        foreach ($users as $index => $user) {
            $output .= '
                <tr>
                    <td>' . ($index + 1) . '</td>
                    <td>' . $user->name . '</td>
                    <td>' . $user->email . '</td>
                    <td>
                        <a href="' . route('user-dashboard.show', $user->id) . '" class="btn" style="border: none; color: rgba(68, 38, 237, 0.848); padding: 8px 16px; text-align: center; text-decoration: none; display: inline-block; font-size: 14px; transition-duration: 0.4s; cursor: pointer; border-radius: 4px;">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="' . route('user-dashboard.edit', $user->id) . '" class="btn" style="border: none; color: rgba(53, 211, 21, 0.814); padding: 8px 16px; text-align: center; text-decoration: none; display: inline-block; font-size: 14px; transition-duration: 0.4s; cursor: pointer; border-radius: 4px;">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="' . route('user-dashboard.destroy', $user->id) . '" method="POST" style="display: inline">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="btn" onclick="return confirm(\'Are you sure you want to delete this user?\');" style="border: none; color: rgba(246, 16, 16, 0.7); padding: 8px 16px; text-align: center; text-decoration: none; display: inline-block; font-size: 14px; transition-duration: 0.4s; cursor: pointer; border-radius: 4px;">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>';
        }

        return $output;
    }
}
